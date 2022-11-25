import { module as M } from '@19h47/modular';

import { disableScroll, enableScroll } from 'utils/scroll';

class Nav extends M {
	constructor(m) {
		super(m);

		this.isOpen = this.el.classList.contains('is-open');

		this.events = {
			click: {
				backdrop: 'toggle',
				button: 'toggle',
			},
		};

		document.addEventListener('keydown', ({ keyCode }) => {
			if (27 === keyCode) {
				this.close();
			}
		});
	}

	toggle() {
		if (this.isOpen) return this.close();

		return this.open();
	}

	open() {
		if (this.isOpen) return false;

		this.isOpen = true;

		this.el.classList.add('is-active');
		this.el.style.setProperty('opacity', '1');
		this.el.style.setProperty('visibility', 'visible');

		// When Nav is open, disableScroll
		disableScroll();
		this.call('stop', false, 'Scroll', 'main');

		return true;
	}

	close() {
		if (!this.isOpen) return false;

		this.isOpen = false;

		this.el.classList.remove('is-active');
		this.el.style.setProperty('opacity', '0');
		this.el.style.setProperty('visibility', 'hidden');

		// When Nav is closed, enableScroll
		enableScroll();
		this.call('start', false, 'Scroll', 'main');

		return true;
	}
}

export default Nav;
