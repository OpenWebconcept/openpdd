#!/usr/bin/env node
const shell = require( 'shelljs' );
const path = require( 'path' );
const program = require( 'commander' );
const inquirer = require( 'inquirer' );
const { readdirSync, statSync } = require( 'fs' );

const dirs = ( dirPath ) =>
	readdirSync( dirPath )
		.filter( ( folder ) =>
			statSync( path.join( dirPath, folder ) ).isDirectory()
		)
		.filter(
			( folder ) => folder !== 'node_modules' && folder !== 'config'
		);

program
	.version( '0.0.0', 'v, version' )
	.description( 'A CLI for running npm scripts' )
	.option( '-s, -start', 'run prompt', runAll )
	.option( '-d, -dev', 'run development', startDev )
	.option( '-p -prod', 'run production', startProd )
	.parse( process.argv );

function runTask( task = 'dev', theme ) {
	shell.exec( `npm run ${ task } -- --env theme=${ theme }` );
}

function runAll() {
	const themes = dirs( __dirname );
	const questions = [
		{
			type: 'list',
			name: 'q1',
			message: 'Which command would you like to run?',
			choices: [
				'dev',
				'dev:editor',
				'dev:frontend',
				'dev-all',
				'prod',
				'prod:editor',
				'prod:frontend',
				'prod-all',
				'critical-css',
			],
		},
		{
			type: 'list',
			name: 'q2',
			message: 'And for what theme?',
			choices: themes,
		},
	];
	inquirer.prompt( questions ).then( function ( answers ) {
		runTask( answers.q1, answers.q2 );
	} );
}

function startDev() {
	const themes = dirs( __dirname );
	const questions = [
		{
			type: 'list',
			name: 'q1',
			message: 'Which theme?',
			choices: themes,
		},
	];
	inquirer.prompt( questions ).then( function ( answers ) {
		runTask( 'dev', answers.q1 );
	} );
}

function startProd() {
	const themes = dirs( __dirname );
	const questions = [
		{
			type: 'list',
			name: 'q1',
			message: 'Which theme?',
			choices: themes,
		},
	];
	inquirer.prompt( questions ).then( function ( answers ) {
		runTask( 'prod', answers.q1 );
	} );
}
