(function($, exports) {

var F =
{
	curYear : '',
	curMonth : '',
	curDay : '',
	curType : '',
	curYmd : 'years',

	setCurYear : function setCurYear(val)
	{
		this.curYear = val;
	},

	setCurMonth : function setCurMonth(val)
	{
		this.curMonth = val;
	},

	setCurDay : function setCurDay(val)
	{
		this.curDay = val;
	},

	setCurType : function setCurType(val)
	{
		this.curType = val;
	},

	setCurYmd : function setCurYmd(val)
	{
		var ymd;
		switch(val)
		{
			case 'years':
				ymd = 'months';
				break;
			case 'months':
				ymd = 'days';
				break;
			case 'days':
				ymd = 'days';
				break;
			default:
				ymd = 'years';
		}

		this.curYmd = ymd;
	},

	getCurYear : function getCurYear()
	{
		return this.curYear;
	},

	getCurMonth : function getCurMonth()
	{
		return this.curMonth;
	},

	getCurDay : function getCurDay()
	{
		return this.curDay;
	},

	getCurType : function getCurType()
	{
		return this.curType;
	},

	getCurYmd : function getCurYmd()
	{
		return this.curYmd;
	},

	capitalize : function capitalize(string)
	{
		return string.charAt(0).toUpperCase() + string.slice(1);
	},

	loadDummy : function loadDummy()
	{
		var that = this;
		$.get(window.location.pathname + '/warnings/2012_01_26', function (data) {

			console.log(data);
			var html = '';
			var count = 0;
			$.each(data, function (index, item) {
				if (++count < 20)
				{
					html += '<tr><td class="warning">' + item + '</span></td></tr>';
				}
			});

			$('#logs').html(html);
			that.initTable();
		});
	},
	initTable : function initTable()
	{
		var oTable = $('#example').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers"
		});
	},

	getYmd : function getYmd(txt)
	{
		var api;

		switch(txt)
		{
			case 'years':
				api = 'months';
				break;
			case 'months':
				api = 'days';
				break;
			default:
				api = 'years';
		}

		return api;
	},

	buildUrl : function buildUrl(val)
	{
		var txt = $('#ymd').text();
		var	path = getYmd(txt);
		var api;

		switch(path)
		{
			case 'years':
				api = '/months/' + txt;
				break;
			case 'months':
				api = '/days/' + curYear + '_' + txt;
				break;
			case 'days':
				api = '/' + curType + '/' + curYear + '_' + curMonth + '_' + txt;
				break;
			default:
				api = '/years';
		}

		return api;
	},

	updateSideHeading : function updateSideHeading()
	{
		$('#ymd').fadeOut(function ()
		{
			var el = $(this);
			var txt = el.text().toLowerCase();
			var	api = getYmd(txt);

			$(this).text(capitalize(api)).fadeIn();
		});
	},

	updateSideLinks : function updateSideLinks(target)
	{
		var el = $(target);
		var val = el.text();
		var api = buildUrl(val);
	},

	leftnavClicked : function leftnavClicked(e)
	{
		console.log('clicked');


		e.preventDefault();
	},

	attachListeners : function attachListeners()
	{
		$('#ymd-list').live('click', 'a', $.proxy(this.leftnavClicked, this));
	},

	init : function init()
	{
		this.loadDummy();
		this.attachListeners();
	}
};

exports.F = F;

})(jQuery, window);

// init on dom load
$(function() { F.init(); });