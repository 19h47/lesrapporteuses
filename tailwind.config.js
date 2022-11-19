const plugin = require('tailwindcss/plugin');
const defaultTheme = require("tailwindcss/defaultTheme");

const colors = {};
const fontSize = {};
const maxWidth = {};
const spacing = {
	'1/12': `${(1 / 12) * 100}%`,
	'1.5/12': `${(1.5 / 12) * 100}%`,
	'2/12': `${(2 / 12) * 100}%`,
};

const zIndex = {
	1: '1',
	2: '2',
	3: '3',
	4: '4',
	5: '5',
};

module.exports = {
	content: ['./views/**/*.twig', './src/**/*.{html,js}', './includes/**/*.php'],
	theme: {
		extend: {
			colors,
			fontSize,
			maxWidth,
			spacing,
			zIndex,
		},
		fontFamily: {
			display: ['"Futura"', ...defaultTheme.fontFamily.sans],
			body: ["Futura", ...defaultTheme.fontFamily.sans],
		},
	},
	plugins: [
		plugin(({ addVariant }) => addVariant('has-dom-ready', 'html.has-dom-ready &')),
		plugin(({ addVariant }) => addVariant('is-inview', '.is-inview &')),
		plugin(({ addVariant }) => addVariant('is-active', '.is-active &')),
		plugin(({ addVariant }) => addVariant('expanded', '[aria-expanded="true"] &')),
		plugin(({ addVariant }) => addVariant('child', '& > *')),
	],
};
