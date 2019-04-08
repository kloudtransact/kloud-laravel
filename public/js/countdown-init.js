(function() {
	function pickElement(filter) {
		return document.querySelector(filter);
	}
	
	function pickElements(filter) {
		return document.querySelectorAll(filter);
	}

	// Mayan Calendar: 1356088271111

	
	function update() {
		var units = countdown.DAYS | countdown.HOURS | countdown.MINUTES | countdown.SECONDS,
			
			empty = "now!",
			max = 11,
			digits = 20;

		var yyyy = 2019,
			MM = 4,
			dd = 25,
			HH = 17,
			mm = 59,
			ss = 0;

		var start = new Date(yyyy, MM, dd, HH, mm, ss, fff),
			ts = countdown(null, start, units, max, digits);

		var deals = pickElements('span.deadline'),
			//msg = ts.toHTML('strong', empty);
			msg = ts.days + ":" + ts.hours + ":" + ts.minutes + ":" + ts.seconds;

		deals.forEach(function(el) {
         el.innerHTML = msg;
       });
       
       var auctionSection = pickElement('#auction-section');

		requestAnimationFrame(update, auctionSection);
	}
	update();
})();