const item = document.querySelectorAll('.vn-pay-item img');
const coin = document.querySelectorAll('#token-accordion .coin .coin-item');

item.forEach((e)=>{
    e.addEventListener('click',function(){
        setBorder();
        e.style.border = '1px solid #BD8522'
    })
})
let setBorder = function(){
    item.forEach((e)=>{
        e.style.border = '1px solid #fff'
    })
}
let getBorder = function(){
    item.forEach((e)=>{
        e.style.border = '1px solid #fff'
    })
}
getBorder();

coin.forEach((e)=>{
    e.addEventListener('click',function(){
        setBorderCoin();
        e.style.color = '#FFF'
        e.style.background = '#BD8522'
    })
})
let setBorderCoin = function(){
    coin.forEach((e)=>{
        e.style.color = '#000'
        e.style.background = '#fff'
    })
}