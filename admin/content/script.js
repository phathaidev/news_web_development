 <script>
        window.onscroll=function(){
		var nav_top=document.getElementById("nav_top");
		var nav_bottom=document.getElementById("nav_bottom");
            if(window.pageYOffset>nav_top.offsetHeight){
                nav_bottom.style.position='fixed';
                nav_bottom.style.backgroundColor="blue";
                nav_bottom.style.top=0;
                nav_top.marginBottom=nav_bottom.offsetHeight + "px";

            }
            else{
                nav_bottom.style.position='';
                nav_bottom.style.top='';
                nav_top.marginBottom="";
            }
        }
    </script>