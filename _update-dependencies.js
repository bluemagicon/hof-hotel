// Einstellungen
const pathConfig		= './package.json';
const pathLinks			= './dependencies';
const pathDependencies	= './node_modules';

// Abhängigkeiten einbinden
const fs				= require('fs');
const path				= require('path');
const chalk				= require('chalk');
const { promisify }		= require('util');
const log				= console.log;

// Funktionen vorbereiten
const fileExists		= promisify(fs.exists);
const deleteLink		= promisify(fs.unlink);
const createSymlink		= promisify(fs.symlink);
const createDirectory	= promisify(fs.mkdir);
const readDirectory		= promisify(fs.readdir);

// run
main();

async function main() {
	if (!fs.existsSync(pathConfig)) {
		log(chalk.red('Es existiert keine package.json'));
		process.exit(1);
	}
	const packages = JSON.parse(fs.readFileSync(pathConfig));
	if (!packages) {
		log(chalk.red('Die package.json konnte nicht korrekt gelesen werden'));
		process.exit(1);
	}

	const deps = Object.keys(packages.dependencies);
	log(chalk.green(`\n${deps.length} Abhängigkeiten gefunden!`));

	await ((await fileExists(pathLinks)) ? updateRelevant : createRelevant)(deps, pathLinks);

	log();
}

async function updateRelevant(dependencies, directory) {
	const files		= await readDirectory(directory);
	const spare		= files.filter(f => !dependencies.map(d => d.replace('/', '_')).includes(f));
	const additions	= dependencies.filter(d => !files.includes(d.replace('/', '_')));

	log(`${spare.length} überflüssige Links werden entfernt`);
	log(`${additions.length} neue Abhängigkeiten werden verlinkt`);

	if (additions.length) {
		log(`\nErstelle neue Links...`);
		await createRelevant(additions, directory);
	}

	if (spare.length) {
		log(`\nEntferne überflüssige Links...`);
		try {
			let paths = spare.map(d => path.join(directory, d.replace('/', '_')));
			await deleteSpares(paths);
			log(chalk.green(`\nDone!\n`));
		}
		catch (err) {
			log(chalk.red(err.message));
		}
	}
}

function deleteSpares(files) {
	return Promise.all(files.map(file => {
		return deleteLink(file)
			.then(()	=> log(chalk.green(`"${file}" entfernt`)))
			.catch(()	=> log(chalk.red(`Konnte "${file}" nicht löschen`)));
	}));
}

async function createRelevant(dependencies, directory) {
	if (!Array.isArray(dependencies)) {
		throw new Error('dependencies muss ein Array von Strings sein');
	}

	if (!(await fileExists(directory))) {
		await createDirectory(directory);
	}

	await Promise.all(dependencies.map(dependency => {
		const pathTarget	= path.join(pathDependencies, dependency);
		const pathLink		= path.join(directory, dependency.replace('/', '_'));
		return createLink(pathTarget, pathLink)
			.then(()	=> log(chalk.green(`Link für ${dependency} erstellt!`)))
			.catch(err	=> log(chalk.red(err.message)));
	}));
}

async function createLink(target, link) {
	if (!(await fileExists(target))) {
		throw new Error(`Ziel "${target}" existiert nicht`);
	}

	const pathLink = path.relative(path.dirname(link), target);
	await createSymlink(pathLink, link, 'dir');
}
