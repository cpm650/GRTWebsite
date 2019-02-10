import 'keen-dataviz'
console.log('Hi!');
const chart = new KeenDataviz({
    container: '#pie-grade', // querySelector
    title: 'pie-grade',
    type: 'area'
});
chart.render({result:[1,2,3,4,5]});
