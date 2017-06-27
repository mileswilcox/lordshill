window.init = function() {
	'use strict';

	window.propCore = {};

	var events = {},
		operation,
		tidy = function(operation, task) {
			var result = operation.split('__');

			if(task === true) {
				result = result[0];
			} else {
				result.shift();
			}

			return result;
		},
		bindEvents = function(events, operation) {
			var clean = tidy(operation, true);

			for(var i = 0, l = events.length; i < l; i++) {
				try {
					propCore[clean] = new propFuncs[operation]();

					if(events[i] === 'scroll' || events[i] === 'resize') {
						var action = events[i];

						$(window).on(events[i], function(e) {
                    		var event = e;

	                        if(window.requestAnimationFrame) {
	                            window.requestAnimationFrame(function() {
	                                propCore[clean][action](event);
	                            });
	                        } else {
	                            propCore[clean][action](event);
	                        }
						});
					}
				} catch(error) {
					if(console.groupCollapsed) {
	                    console.groupCollapsed('%c ['+ operation +' error] - ' + error.message + '. Expand for details:', 'color: #ff5a5a')
							.info('%c '+error.stack, 'color: #ff5a5a')
							.groupEnd();
					}
				}
			}
		};

	for(operation in window.propFuncs) {
		var clean = tidy(operation, true);

		events[clean] = tidy(operation);
		bindEvents(events[clean], operation);
	}
};
