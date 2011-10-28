describe("Charts loading overlay", function() {

	beforeEach( function() {
		// For hooking up the overlay on #display
		this.div = inject('<div id="display"></div><div id="location"></div><div id="comm_block"></div><div id="export_options"></div><div id="link_field"></div>');
		
  		// For testing if the z-index of the hover tooltips prevents overlap
  		this.variableHover = inject('variableHover');
        this.server = sinon.fakeServer.create();

        this.server.respondWith(
	        "GET",
	        "charts_fetch_data.php?community=Alakanuk&dataset=1&scenario=A1B&variability=0&fetch_type=chart",
            [
            	200,
            	{ "Content-Type": "text/plain" },
            	'server response from chart data'
            ]
        );

        snapCharts.initialize(); // refresh element bindings as appropriate
    });

    afterEach( function() { 
        this.server.restore();
    });

	it("should have a Loading... indicator when an AJAX request is in progress, removing it after the request completes", function() {

		// No overlay until AJAX
		expect( $('.blockOverlay') ).not.toExist();


		// Overlay while AJAX is pending
		snapCharts.fetchData('Alakanuk',1,'A1B',0,'chart');
		expect( $('.blockOverlay') ).toExist();
		expect( $('.blockOverlay') ).toBeVisible();

		// No overlay after server response
		this.server.respond();
		expect( $('.blockOverlay') ).not.toExist();
		expect( $('.blockOverlay') ).not.toBeVisible();

	});

	it("should behave correctly if the server returns an unexpected (non-200) response code", function() {

        this.server.respondWith(
	        "GET",
	        "charts_fetch_data.php?community=Alakanuk&dataset=1&scenario=A1B&variability=0&fetch_type=chart",
            [
            	500,
            	{},
            	''
            ]
        );

        // No overlay until AJAX
		expect( $('.blockOverlay') ).not.toExist();

		// we just want to make sure it unmasks if error case is hit
		snapCharts.fetchData('Alakanuk',1,'A1B',0,'chart');
		
		$('#display').block(); // manually block because the fixture doesn't seem to place nice, here?
		expect( $('.blockOverlay') ).toExist();
		expect( $('.blockOverlay') ).toBeVisible();
		this.server.respond();
		expect( $('.blockOverlay') ).not.toExist();
		expect( $('.blockOverlay') ).not.toBeVisible();

	});

	it("shouldn't display above the explanations of the variables shown", function() {
		
		$('#display').block();
		expect( $('.variableHover').css('z-index')).toBeGreaterThan( $('.blockOverlay').css('z-index') );

	});

});