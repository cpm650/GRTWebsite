/*const pie-grade = new KeenDataviz({
    container: "#pie-grade",
    title: 'grade-distribution',
    type: 'bar',
    height: '350'
});*/
console.log('Hi!');
var sample_funnel = new KeenDataviz()
    .el('#pie-grade')
    .colors(['#00cfbb'])
    .data({ result: [ 3250, 3000, 2432, 1504, 321 ] })
    .height(340)
    .type('bar')
    .labels(['Purchased Device', 'Activated Device', 'First Session', 'Second Session', 'Invited Friend'])
    .title(null)
    .render();
