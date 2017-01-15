function Properties(){
this.segments = 4,
this.growth = 86,
this.step = 0.02,
this.rows = 20,
this.lineDiff = 0.12,
this.curveDiff = 1,
this.lineWidth = 1,
this.lineColor = '#FF4081',
this.bgColor = '#232453'
}

// Perlin noise function creted by Banksean
// https://gist.github.com/banksean/304522
var ClassicalNoise=function(a){void 0==a&&(a=Math),this.grad3=[[1,1,0],[-1,1,0],[1,-1,0],[-1,-1,0],[1,0,1],[-1,0,1],[1,0,-1],[-1,0,-1],[0,1,1],[0,-1,1],[0,1,-1],[0,-1,-1]],this.p=[];for(var b=0;b<256;b++)this.p[b]=Math.floor(256*a.random());this.perm=[];for(var b=0;b<512;b++)this.perm[b]=this.p[255&b]};ClassicalNoise.prototype.dot=function(a,b,c,d){return a[0]*b+a[1]*c+a[2]*d},ClassicalNoise.prototype.mix=function(a,b,c){return(1-c)*a+c*b},ClassicalNoise.prototype.fade=function(a){return a*a*a*(a*(6*a-15)+10)},ClassicalNoise.prototype.noise=function(a,b,c){var d=Math.floor(a),e=Math.floor(b),f=Math.floor(c);a-=d,b-=e,c-=f,d&=255,e&=255,f&=255;var g=this.perm[d+this.perm[e+this.perm[f]]]%12,h=this.perm[d+this.perm[e+this.perm[f+1]]]%12,i=this.perm[d+this.perm[e+1+this.perm[f]]]%12,j=this.perm[d+this.perm[e+1+this.perm[f+1]]]%12,k=this.perm[d+1+this.perm[e+this.perm[f]]]%12,l=this.perm[d+1+this.perm[e+this.perm[f+1]]]%12,m=this.perm[d+1+this.perm[e+1+this.perm[f]]]%12,n=this.perm[d+1+this.perm[e+1+this.perm[f+1]]]%12,o=this.dot(this.grad3[g],a,b,c),p=this.dot(this.grad3[k],a-1,b,c),q=this.dot(this.grad3[i],a,b-1,c),r=this.dot(this.grad3[m],a-1,b-1,c),s=this.dot(this.grad3[h],a,b,c-1),t=this.dot(this.grad3[l],a-1,b,c-1),u=this.dot(this.grad3[j],a,b-1,c-1),v=this.dot(this.grad3[n],a-1,b-1,c-1),w=this.fade(a),x=this.fade(b),y=this.fade(c),z=this.mix(o,p,w),A=this.mix(s,t,w),B=this.mix(q,r,w),C=this.mix(u,v,w),D=this.mix(z,B,x),E=this.mix(A,C,x),F=this.mix(D,E,y);return F};

var canvas,
ctx,
segmentSize,
number,
n,
prop = new Properties();

$(document).ready(function() {
//dat.gui set up
var gui = new dat.GUI();
var segmentController = gui.add(prop, 'segments', 1, 15).step(1);
gui.add(prop, 'growth', 1, 1000);
gui.add(prop, 'step', 0.01, 1);
gui.add(prop, 'rows', 1, 100).step(1);
gui.add(prop, 'lineDiff', 0.001, 1);
gui.add(prop, 'curveDiff', 0.001, 1);
gui.add(prop, 'lineWidth', 1, 10);
gui.addColor(prop, 'lineColor');
gui.addColor(prop, 'bgColor');
this.curveDiff = 1
canvas = document.getElementById("myCanvas");
calculateResize();
ctx = canvas.getContext("2d");
n = new ClassicalNoise();
init();

segmentController.onChange(function(){
calculateResize();
})

$(window).resize(function(){
calculateResize();
});

});

function init(){
number = 0;
iterate();
}

function calculateResize(){
canvas.width = $( window ).width();
canvas.height = 130;
segmentSize = distance( 0, canvas.height/2, canvas.width, canvas.height/2) / prop.segments;
}

function iterate(){
clearCanvas();
for(var i = 1; i <= Math.floor(prop.rows); i++){
drawCurve(i);
}
number += prop.step;
//requestAnimationFrame(iterate);
setTimeout(function() {iterate()}, 50);
}

function drawCurve(row){
var height = canvas.height/(prop.rows + 1) * row;
var initialNoise = n.noise(number, row * prop.lineDiff, 0);
var path = 'M0,' + Math.round((height) + (initialNoise * prop.growth));
ctx.save();
ctx.strokeStyle = prop.lineColor;
ctx.lineWidth = prop.lineWidth;
ctx.beginPath();
for(var i = 1; i <= prop.segments; i++){
var noise1 = n.noise(number, row * prop.lineDiff, i * prop.curveDiff);
var noise2 = n.noise(number, row * prop.lineDiff, (i-0.5) * prop.curveDiff);
path = path + ' S' + Math.round((segmentSize * (i-1)) + segmentSize / 2) + ',' +
Math.round((height) + (noise1 * prop.growth)) + ' ' +
Math.round(segmentSize * i) + ',' +
Math.round((height) + (noise2 * prop.growth));
};
//path = path + ' T' + (segmentSize * prop.segments-1) + ',' + height;
ctx.stroke(new Path2D(path));
ctx.restore();
}

function clearCanvas(){
ctx.save();
ctx.fillStyle = prop.bgColor;
ctx.fillRect(0, 0, canvas.width, canvas.height);
ctx.restore();
}

function distance(x1, y1, x2, y2){
return Math.sqrt( (x2-=x1)*x2 + (y2-=y1)*y2 );
}
