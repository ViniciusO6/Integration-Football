let active=0
function FadeMenu(){
    
    if(active == 0){
    menu.style.transform = 'translate(0%)';
    menu.style.transition = 'transform 0.3s ease-in';
    active = 1;
    }else if(active==1){
    menu.style.transform = 'translate(-100%)';
    menu.style.transition = 'transform 0.3s out-in';
    active = 0;
    }
  
}