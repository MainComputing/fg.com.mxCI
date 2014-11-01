$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            iphone: 266,
            ipad: null,
            itouch: 264
        }, {
            period: '2010 Q2',
            iphone: 277,
            ipad: 229,
            itouch: 244
        }, {
            period: '2010 Q3',
            iphone: 491,
            ipad: 196,
            itouch: 250
        }, {
            period: '2010 Q4',
            iphone: 376,
            ipad: 359,
            itouch: 568
        }, {
            period: '2011 Q1',
            iphone: 681,
            ipad: 191,
            itouch: 229
        }, {
            period: '2011 Q2',
            iphone: 567,
            ipad: 429,
            itouch: 188
        }, {
            period: '2011 Q3',
            iphone: 482,
            ipad: 379,
            itouch: 158
        }, {
            period: '2011 Q4',
            iphone: 450,
            ipad: 446,
            itouch: 202
        }, {
            period: '2012 Q2',
            iphone: 843,
            ipad: 571,
            itouch: 179
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['Curso de Inducción', 'Curso de Ventas', 'Curso de Mostrador'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
