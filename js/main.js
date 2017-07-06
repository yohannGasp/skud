   // encrypting str to url
   var convToP = function(str){

                var a = ["а","б","в","г","д","е","ё","ж","з","и","й","к",
                        "л","м","н","о","п","р","с","т","у","ф","х","ц","ч",
                        "ш","щ","ъ","ы","ь","э","ю","я"];

                var dec1 = "$";
                var str2 = "";
                str = str.toLowerCase();
                str = str.split('');

                for(var i = 0; i < str.length; i++){
                    for(var j = 0; j < a.length; j++){
                        if(str[i] == a[j]){                        	
                            str2 += j + dec1;
                            break;
                        }
                    }
                }

                return str2;
            }


  function OnShowData(){
   var dt1 = document.getElementById("appendedInputButton1").value;
   var dt2 = document.getElementById("appendedInputButton2").value;
   var fioName = document.getElementById("id_fio").value;
   var vk = document.getElementById("id_vk").value;
   var vdiv = document.getElementById("id_vdiv").value;
   
//     var div = document.createElement('div');
//     div.innerHTML = "<a href=\"http://localhost/?date1=" + dt1 + "&date2=" + dt2 + "\">Показать</a>";
//     document.body.appendChild(div);

   location.href = '?date1=' + dt1 + '&date2=' + dt2 + '&fio=' + convToP(fioName) + '&vk=' + vk + '&vdiv=' + vdiv;
  } 
