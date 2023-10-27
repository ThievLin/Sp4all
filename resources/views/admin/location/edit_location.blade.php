<!-- (Provine) -->
<script>
function myclient_province() {
    var x = document.getElementById("client_province").value;
    if( x == "រាជធានីភ្នំពេញ" ){
        document.getElementById("iclient_district").innerHTML ="<select class='form-control'  name='client_district' id='client_district' onchange='myclient_district()'>"+
        '<option>ជ្រើសរើស​ ស្រុក/ខណ្ឌ</option>'+
        '<option value="ចំការមន">ចំការមន</option>'+ 
        '<option value="ដូនពេញ">ដូនពេញ</option>'+
        '<option value="៧មករា">៧មករា</option>'+
        '<option value="ទួលគោក">ទួលគោក</option>'+
    '<option value="ដង្កោ">ដង្កោ</option>'+
    '<option value="មានជ័យ">មានជ័យ</option>'+
        '<option value="ឫស្សីកែវ">ឫស្សីកែវ</option>'+
        '<option value="សែនសុខ">សែនសុខ</option>'+
        '<option value="ពោធិ៍សែនជ័យ">ពោធិ៍សែនជ័យ</option>'+
        '<option value="ជ្រោយចង្វារ">ជ្រោយចង្វារ</option>'+
        '<option value="ព្រែកព្នៅ">ព្រែកព្នៅ</option>'+
        '<option value="ច្បារអំពៅ">ច្បារអំពៅ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if(x == "ខេត្តកណ្ដាល" ){
        document.getElementById("iclient_district").innerHTML ="<select class='form-control'  name='client_district' id='client_district' onchange='myclient_district()'>"+
        '<option value="កណ្ដាលស្ទឹង">កណ្ដាលស្ទឹង</option>'+
        '<option value="កៀនស្វាយ">កៀនស្វាយ</option>'+
        '<option value="ខ្សាច់កណ្ដាល">ខ្សាច់កណ្ដាល</option>'+
        '<option value="កោះធំ">កោះធំ</option>'+
        '<option value="លើកដែក">លើកដែក</option>'+
        '<option value="ល្វាឯម">ល្វាឯម</option>'+
        '<option value="មុខកំពូល">មុខកំពូល</option>'+
        '<option value="អង្គស្នួល">អង្គស្នួល</option>'+
        '<option value="ពញាឮ">ពញាឮ</option>'+
        '<option value="ស្អាង">ស្អាង</option>'+
        '<option value="ក្រុងតាខ្មៅ">ក្រុងតាខ្មៅ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if(x == "ខេត្តតាកែវ" ){
        document.getElementById("iclient_district").innerHTML ="<select class='form-control'  name='client_district' id='client_district' onchange='myclient_district()'>"+
        '<option value="អង្គរបូរី">អង្គរបូរី</option>'+
        '<option value="បាទី">បាទី</option>'+
        '<option value="បូរីជលសារ">បូរីជលសារ</option>'+
        '<option value="គីរីវង់">គីរីវង់</option>'+
        '<option value="កោះអណ្ដែត">កោះអណ្ដែត</option>'+
        '<option value="ព្រៃកប្បាស">ព្រៃកប្បាស</option>'+
        '<option value="សំរោង">សំរោង</option>'+
        '<option value="ក្រុងដូនកែវ">ក្រុងដូនកែវ</option>'+
        '<option value="ត្រាំកក់">ត្រាំកក់</option>'+
        '<option value="ទ្រាំង">ទ្រាំង</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if(x == "ខេត្តកំពត" ){
        document.getElementById("iclient_district").innerHTML ="<select class='form-control'  name='client_district' id='client_district' onchange='myclient_district()'>"+
        '<option value="អង្គរជ័យ">អង្គរជ័យ</option>'+
        '<option value="បន្ទាយមាស">បន្ទាយមាស</option>'+
        '<option value="ឈូក">ឈូក</option>'+
        '<option value="ជុំគិរី">ជុំគិរី</option>'+
        '<option value="ដងទង់">ដងទង់</option>'+
        '<option value="កំពង់ត្រាច">កំពង់ត្រាច</option>'+
        '<option value="ទឹកឈូ">ទឹកឈូ</option>'+
        '<option value="ក្រុងកំពត">ក្រុងកំពត</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if(x == "ខេត្តកំពង់ស្ពឺ" ){
        document.getElementById("iclient_district").innerHTML ="<select class='form-control'  name='client_district' id='client_district' onchange='myclient_district()'>"+
        '<option value="បរសេដ្ឋ">បរសេដ្ឋ</option>'+
        '<option value="ក្រុងច្បារមន">ក្រុងច្បារមន</option>'+
        '<option value="គងពិសី">គងពិសី</option>'+
        '<option value="ឱរ៉ាល់">ឱរ៉ាល់</option>'+
        '<option value="ឧដុង្គ">ឧដុង្គ</option>'+
        '<option value="ភ្នំស្រួច">ភ្នំស្រួច</option>'+
        '<option value="សំរោងទង">សំរោងទង</option>'+
        '<option value="ថ្ពង">ថ្ពង</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }
    
}
function myclient_district() {
    var x = document.getElementById("client_district").value;
 // Phnom Penh  
    if( x == "ចំការមន" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
    '<option value="ទន្លេបាសាក់">ទន្លេបាសាក់</option>'+
        '<option value="បឹងកេងកងទី ១">បឹងកេងកងទី ១</option>'+
        '<option value="បឹងកេងកងទី ២">បឹងកេងកងទី ២</option>'+
        '<option value="បឹងកេងកងទី ៣">បឹងកេងកងទី ៣</option>'+
        '<option value="អូឡាំពិក">អូឡាំពិក</option>'+
        '<option value="ទួលស្វាយព្រៃទី ១">ទួលស្វាយព្រៃទី ១</option>'+
        '<option value="ទួលស្វាយព្រៃទី ២">ទួលស្វាយព្រៃទី ២</option>'+
        '<option value="ទំនប់ទឹក">ទំនប់ទឹក</option>'+
        '<option value="ទួលទំពូងទី ២">ទួលទំពូងទី ២</option>'+
        '<option value="ទួលទំពូងទី ១">ទួលទំពូងទី ១</option>'+
        '<option value="បឹងត្របែក">បឹងត្របែក</option>'+
        '<option value="ផ្សារដើមថ្កូវ">ផ្សារដើមថ្កូវ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ដូនពេញ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ផ្សារថ្មីទី ១">ផ្សារថ្មីទី ១</option>'+
        '<option value="ផ្សារថ្មីទី ២">ផ្សារថ្មីទី ២</option>'+
        '<option value="ផ្សារថ្មីទី ៣">ផ្សារថ្មីទី ៣</option>'+
        '<option value="បឹងរាំង">បឹងរាំង</option>'+
        '<option value="ផ្សារកណ្ដាលទី១">ផ្សារកណ្ដាលទី១</option>'+
        '<option value="ផ្សារកណ្ដាលទី២">ផ្សារកណ្ដាលទី២</option>'+
       ' <option value="ចតុមុខ">ចតុមុខ</option>'+
        '<option value="ជ័យជំនះ">ជ័យជំនះ</option>'+
        '<option value="ផ្សារចាស់">ផ្សារចាស់</option>'+
        '<option value="ស្រះចក">ស្រះចក</option>'+
       ' <option value="វត្ដភ្នំ">វត្ដភ្នំ</option>'+
       '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "៧មករា" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="អូរឫស្សីទី ១">អូរឫស្សីទី ១</option>'+
        '<option value="អូរឫស្សីទី ២">អូរឫស្សីទី ២</option>'+
        '<option value="អូរឫស្សីទី ៣">អូរឫស្សីទី ៣</option>'+
        '<option value="អូរឫស្សីទី ៤">អូរឫស្សីទី ៤</option>'+
        '<option value="មនោរម្យ">មនោរម្យ</option>'+
        '<option value="មិត្ដភាព">មិត្ដភាព</option>'+
        '<option value="វាលវង់">វាលវង់</option>'+
        '<option value="បឹងព្រលឹត">បឹងព្រលឹត</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ទួលគោក" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ផ្សារដេប៉ូទី ១">ផ្សារដេប៉ូទី ១</option>'+
        '<option value="ផ្សារដេប៉ូទី ២">ផ្សារដេប៉ូទី ២</option>'+
        '<option value="ផ្សារដេប៉ូទី ៣">ផ្សារដេប៉ូទី ៣</option>'+
        '<option value="ទឹកល្អក់ទី ១">ទឹកល្អក់ទី ១</option>'+
        '<option value="ទឹកល្អក់ទី ២">ទឹកល្អក់ទី ២</option>'+
        '<option value="ទឹកល្អក់ទី ៣">ទឹកល្អក់ទី ៣</option>'+
        '<option value="បឹងកក់ទី ១">បឹងកក់ទី ១</option>'+
        '<option value="បឹងកក់ទី ២">បឹងកក់ទី ២</option>'+
        '<option value="ផ្សារដើមគរ">ផ្សារដើមគរ</option>'+
        '<option value="បឹងសាឡាង">បឹងសាឡាង</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ដង្កោ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ដង្កោ">ដង្កោ</option>'+
        '<option value="ពងទឹក">ពងទឹក</option>'+
        '<option value="ព្រៃវែង">ព្រៃវែង</option>'+
        '<option value="ព្រៃស">ព្រៃស</option>'+
        '<option value="ក្រាំងពង្រ">ក្រាំងពង្រ</option>'+
        '<option value="ប្រទះឡាង">ប្រទះឡាង</option>'+
        '<option value="សាក់សំពៅ">សាក់សំពៅ</option>'+
        '<option value="ជើងឯក">ជើងឯក</option>'+
        '<option value="គងនយ">គងនយ</option>'+
        '<option value="ព្រែកកំពឹស">ព្រែកកំពឹស</option>'+
        '<option value="រលួស">រលួស</option>'+
        '<option value="ស្ពានថ្ម">ស្ពានថ្ម</option>'+
        '<option value="ទៀន">ទៀន</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "មានជ័យ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ស្ទឹងមានជ័យ">ស្ទឹងមានជ័យ</option>'+
        '<option value="បឹងទំពុន">បឹងទំពុន</option>'+
        '<option value="ចាក់អង្រែលើ">ចាក់អង្រែលើ</option>'+
        '<option value="ចាក់អង្រែក្រោម">ចាក់អង្រែក្រោម</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ឫស្សីកែវ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ទួលសង្កែ">ទួលសង្កែ</option>'+
        '<option value="ស្វាយប៉ាក">ស្វាយប៉ាក</option>'+
        '<option value="គីឡូម៉ែត្រលេខ៦">គីឡូម៉ែត្រលេខ៦</option>'+
        '<option value="ឫស្សីកែវ">ឫស្សីកែវ</option>'+
        '<option value="ច្រាំងចំរេះទី ១">ច្រាំងចំរេះទី ១</option>'+
        '<option value="ច្រាំងចំរេះទី ២">ច្រាំងចំរេះទី ២</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "សែនសុខ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ភ្នំពេញថ្មី">ភ្នំពេញថ្មី</option>'+
        '<option value="ទឹកថ្លា">ទឹកថ្លា</option>'+
        '<option value="ឃ្មួញ">ឃ្មួញ</option>'+
        '<option value="ក្រាំងធ្នង់">ក្រាំងធ្នង់</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ពោធិ៍សែនជ័យ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ត្រពាំងក្រសាំង">ត្រពាំងក្រសាំង</option>'+
        '<option value="ភ្លើងឆេះរទេះ">ភ្លើងឆេះរទេះ</option>'+
        '<option value="ចោមចៅ">ចោមចៅ</option>'+
        '<option value="កាកាប">កាកាប</option>'+
        '<option value="សំរោងក្រោម">សំរោងក្រោម</option>'+
        '<option value="បឹងធំ">បឹងធំ</option>'+
        '<option value="កំបូល">កំបូល</option>'+
        '<option value="កន្ទោក">កន្ទោក</option>'+
        '<option value="ឪឡោក">ឪឡោក</option>'+
        '<option value="ស្នោរ">ស្នោរ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ជ្រោយចង្វារ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ជ្រោយចង្វារ">ជ្រោយចង្វារ</option>'+
        '<option value="ព្រែកលៀប">ព្រែកលៀប</option>'+
        '<option value="ព្រែកតាសេក">ព្រែកតាសេក</option>'+
        '<option value="កោះដាច់">កោះដាច់</option>'+
        '<option value="បាក់ខែង">បាក់ខែង</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ព្រែកព្នៅ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ព្រែកព្នៅ">ព្រែកព្នៅ</option>'+
        '<option value="ពញាពន់">ពញាពន់</option>'+
        '<option value="សំរោង">សំរោង</option>'+
        '<option value="គោករកា">គោករកា</option>'+
        '<option value="ពន្សាំង">ពន្សាំង</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ច្បារអំពៅ" ){
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ច្បារអំពៅទី ១">ច្បារអំពៅទី ១</option>'+
        '<option value="ច្បារអំពៅទី ២">ច្បារអំពៅទី ២</option>'+
        '<option value="និរោធ">និរោធ</option>'+
        '<option value="ព្រែកប្រា">ព្រែកប្រា</option>'+
        '<option value="វាលស្បូវ">វាលស្បូវ</option>'+
        '<option value="ព្រែកឯង">ព្រែកឯង</option>'+
        '<option value="ក្បាលកោះ">ក្បាលកោះ</option>'+
        '<option value="ព្រែកថ្មី">ព្រែកថ្មី</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
  // End Phnom Penh
  // Takeo
    }else if ( x == "អង្គរបូរី") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="អង្គរបូរី">អង្គរបូរី</option>'+
        '<option value="បាស្រែ">បាស្រែ</option>'+
        '<option value="គោកធ្លក">គោកធ្លក</option>'+
        '<option value="ពន្លៃ">ពន្លៃ</option>'+
        '<option value="ព្រែកផ្ទោល">ព្រែកផ្ទោល</option>'+
        '<option value="ព្រៃផ្គាំ">ព្រៃផ្គាំ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';

    }else if ( x == "បាទី") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ចំបក់">ចំបក់</option>'+
        '<option value="ចំប៉ី">ចំប៉ី</option>'+
        '<option value="ដូង">ដូង</option>'+
        '<option value="កណ្ដឹង">កណ្ដឹង</option>'+
        '<option value="កុមាររាជា">កុមាររាជា</option>'+
        '<option value="ក្រាំងលាវ">ក្រាំងលាវ</option>'+
        '<option value="ក្រាំងធ្នង់">ក្រាំងធ្នង់</option>'+
        '<option value="លំពង់">លំពង់</option>'+
        '<option value="ពារាម">ពារាម</option>'+
        '<option value="ពត់សរ">ពត់សរ</option>'+
        '<option value="សូរភី">សូរភី</option>'+
        '<option value="តាំងដូង">តាំងដូង</option>'+
        '<option value="ត្នោត">ត្នោត</option>'+
        '<option value="ត្រពាំងក្រសាំង">ត្រពាំងក្រសាំង</option>'+
        '<option value="ត្រពាំងសាប">ត្រពាំងសាប</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';

    }else if ( x == "បូរីជលសារ") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="បូរីជលសារ">បូរីជលសារ</option>'+
        '<option value="ជ័យជោគ">ជ័យជោគ</option>'+
        '<option value="ដូងខ្ពស់">ដូងខ្ពស់</option>'+
        '<option value="កំពង់ក្រសាំង">កំពង់ក្រសាំង</option>'+
        '<option value="គោកពោធិ៍">គោកពោធិ៍</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "គីរីវង់") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="អង្គប្រាសាទ">អង្គប្រាសាទ</option>'+
        '<option value="ព្រះបាទជាន់ជុំ">ព្រះបាទជាន់ជុំ</option>'+
        '<option value="កំណប់">កំណប់</option>'+
        '<option value="កំពែង">កំពែង</option>'+
        '<option value="គីរីចុងកោះ">គីរីចុងកោះ</option>'+
        '<option value="គោកព្រេច">គោកព្រេច</option>'+
        '<option value="ភ្នំដិន">ភ្នំដិន</option>'+
        '<option value="ព្រៃអំពក">ព្រៃអំពក</option>'+
        '<option value="ព្រៃរំដេង">ព្រៃរំដេង</option>'+
        '<option value="រាមអណ្ដើក">រាមអណ្ដើក</option>'+
        '<option value="សោម">សោម</option>'+
        '<option value="តាអូរ">តាអូរ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "កោះអណ្ដែត") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="ក្រពុំឈូក">ក្រពុំឈូក</option>'+
        '<option value="ពេជសារ">ពេជសារ</option>'+
        '<option value="ព្រៃខ្លា">ព្រៃខ្លា</option>'+
        '<option value="ព្រៃយុថ្កា">ព្រៃយុថ្កា</option>'+
        '<option value="រមេញ">រមេញ</option>'+
        '<option value="ធ្លាប្រជុំ">ធ្លាប្រជុំ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "ព្រៃកប្បាស") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()" >'+
        '<option value="អង្កាញ់">អង្កាញ់</option>'+
        '<option value="បានកាម">បានកាម</option>'+
        '<option value="ចំប៉ា">ចំប៉ា</option>'+
        '<option value="ចារ">ចារ</option>'+
        '<option value="កំពែង">កំពែង</option>'+
        '<option value="កំពង់រាប">កំពង់រាប</option>'+
        '<option value="ក្ដាញ់">ក្ដាញ់</option>'+
        '<option value="ពោធិ៍រំចាក">ពោធិ៍រំចាក</option>'+
        '<option value="ព្រៃកប្បាស">ព្រៃកប្បាស</option>'+
        '<option value="ព្រៃល្វា">ព្រៃល្វា</option>'+
        '<option value="ព្រៃផ្ដៅ">ព្រៃផ្ដៅ</option>'+
        '<option value="ស្នោ">ស្នោ</option>'+
        '<option value="តាំងយ៉ាប">តាំងយ៉ាប</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "សំរោង") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="បឹងត្រាញ់ខាងជើង">បឹងត្រាញ់ខាងជើង</option>'+
        '<option value="បឹងត្រាញ់ខាងត្បូង">បឹងត្រាញ់ខាងត្បូង</option>'+
        '<option value="ជើងគួន">ជើងគួន</option>'+
        '<option value="ជំរះពេន">ជំរះពេន</option>'+
        '<option value="ខ្វាវ">ខ្វាវ</option>'+
        '<option value="លំចង់">លំចង់</option>'+
        '<option value="រវៀង">រវៀង</option>'+
        '<option value="សំរោង">សំរោង</option>'+
        '<option value="សឹង្ហ">សឹង្ហ</option>'+
        '<option value="ស្លា">ស្លា</option>'+
        '<option value="ទ្រា">ទ្រា</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "ក្រុងដូនកែវ") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="បារាយណ៍">បារាយណ៍</option>'+
        '<option value="រកាក្នុង">រកាក្នុង</option>'+
        '<option value="រកាក្រៅ">រកាក្រៅ</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "ត្រាំកក់") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="អង្គតាសោម">អង្គតាសោម</option>'+
        '<option value="ជាងទង">ជាងទង</option>'+
        '<option value="គុស">គុស</option>'+
        '<option value="លាយបូរ">លាយបូរ</option>'+
        '<option value="ញ៉ែងញ៉ង">ញ៉ែងញ៉ង</option>'+
        '<option value="អូរសារាយ">អូរសារាយ</option>'+
        '<option value="ត្រពាំងក្រញូង">ត្រពាំងក្រញូង</option>'+
        '<option value="ឧត្ដមសុរិយា">ឧត្ដមសុរិយា</option>'+
        '<option value="ពពេល">ពពេល</option>'+
        '<option value="សំរោង">សំរោង</option>'+
        '<option value="ស្រែរនោង">ស្រែរនោង</option>'+
        '<option value="តាភេម">តាភេម</option>'+
        '<option value="ត្រាំកក់">ត្រាំកក់</option>'+
        '<option value="ត្រពាំងធំខាងជើង">ត្រពាំងធំខាងជើង</option>'+
        '<option value="ត្រពាំងធំខាងត្បូង">ត្រពាំងធំខាងត្បូង</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if ( x == "ត្រាំកក់") {
        document.getElementById("iclient_commune").innerHTML ='<select class="form-control"  name="client_commune" id="client_commune" onchange="myclient_commune()">'+
        '<option value="អង្កាញ់">អង្កាញ់</option>'+
        '<option value="ទ្រាំង">ទ្រាំង</option>'+
        '<option value="ជីខ្មា">ជីខ្មា</option>'+
        '<option value="ខ្វាវ">ខ្វាវ</option>'+
        '<option value="ប្រាំបីមុំ">ប្រាំបីមុំ</option>'+
        '<option value="អង្គកែវ">អង្គកែវ</option>'+
        '<option value="ព្រៃស្លឹក">ព្រៃស្លឹក</option>'+
        '<option value="រនាម">រនាម</option>'+
        '<option value="សំបួរ">សំបួរ</option>'+
        '<option value="សន្លុង">សន្លុង</option>'+
        '<option value="ស្មោង">ស្មោង</option>'+
        '<option value="ស្រង៉ែ">ស្រង៉ែ</option>'+
        '<option value="ធ្លក">ធ្លក</option>'+
        '<option value="ត្រឡាច">ត្រឡាច</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if( x == "ផ្សេងៗ" ){
              document.getElementById("other_district").innerHTML =   '<div class="control-group"><div class="controls"><input type="text" class="span12 m-wrap" name="other_district"></div></div>';
        }
}

function myclient_commune() {
    var x = document.getElementById("client_commune").value;
    if ( x == "ទន្លេបាសាក់") {
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ភូមិ ៦">ភូមិ ៦</option>'+
        '<option value="ភូមិ ៧">ភូមិ ៧</option>'+
        '<option value="ភូមិ ៨">ភូមិ ៨</option>'+
        '<option value="ភូមិ ៩">ភូមិ ៩</option>'+
        '<option value="ភូមិ ១០">ភូមិ ១០</option>'+
        '<option value="ភូមិ ១១">ភូមិ ១១</option>'+
        '<option value="ភូមិ ១២">ភូមិ ១២</option>'+
        '<option value="ភូមិ ១៣">ភូមិ ១៣</option>'+
        '<option value="ភូមិ ១៤">ភូមិ ១៤</option>'+
        '<option value="ភូមិ ១៥">ភូមិ ១៥</option>'+
        '<option value="ភូមិ ១៦">ភូមិ ១៦</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if(x == "បឹងកេងកងទី ១"){
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ភូមិ ៦">ភូមិ ៦</option>'+
        '<option value="ភូមិ ៧">ភូមិ ៧</option>'+
        '<option value="ភូមិ ៨">ភូមិ ៨</option>'+
        '<option value="ភូមិ ៩">ភូមិ ៩</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if(x == "អូឡាំពិក"){
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
       '</select>';
    }else if(x == "ទួលស្វាយព្រៃទី ១"){
    document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ភូមិ ៦">ភូមិ ៦</option>'+
        '<option value="ភូមិ ៧">ភូមិ ៧</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
      '</select>';
    }else if(x == "ទួលស្វាយព្រៃទី ២"){
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ភូមិ ៦">ភូមិ ៦</option>'+
        '<option value="ភូមិ ៧">ភូមិ ៧</option>'+
        '<option value="ភូមិ ៨">ភូមិ ៨</option>'+
        '<option value="ភូមិ ៩">ភូមិ ៩</option>'+
        '<option value="ភូមិ ១០">ភូមិ ១០</option>'+
        '<option value="ភូមិ ១១">ភូមិ ១១</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>';
    }else if (x == "ទំនប់ទឹក") {
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>'
    }else if (x == "ទួលទំពូងទី ២") {
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>'
    }else if (x == "ទួលទំពូងទី ១") {
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>'
    }else if (x == "បឹងត្របែក") {
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ភូមិ ៦">ភូមិ ៦</option>'+
        '<option value="ភូមិ ៧">ភូមិ ៧</option>'+
        '<option value="ភូមិ ៨">ភូមិ ៨</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>'
    }else if (x == "ផ្សារដើមថ្កូវ") {
        document.getElementById("iclient_village").innerHTML ='<select class="form-control"  name="client_village" id="client_village">'+
        '<option value="ភូមិ ១">ភូមិ ១</option>'+
        '<option value="ភូមិ ២">ភូមិ ២</option>'+
        '<option value="ភូមិ ៣">ភូមិ ៣</option>'+
        '<option value="ភូមិ ៤">ភូមិ ៤</option>'+
        '<option value="ភូមិ ៥">ភូមិ ៥</option>'+
        '<option value="ភូមិ ៦">ភូមិ ៦</option>'+
        '<option value="ភូមិ ៧">ភូមិ ៧</option>'+
        '<option value="ផ្សេងៗ">ផ្សេងៗ</option>'+
        '</select>'
    }else if( x == "ផ្សេងៗ" ){
              document.getElementById("other_commune").innerHTML = '<div class="control-group"><div class="controls"><input type="text" class="span12 m-wrap" name="other_commune"></div></div>';
        }

}

function myclient_village(){
        var x = document.getElementById("client_village").value;
    if( x == "ផ្សេងៗ" ){
              document.getElementById("other_village").innerHTML = '<div class="control-group"><div class="controls"><input type="text" class="span12 m-wrap" name="other_village"></div></div>';
     }    
}
</script>

<label class="control-label">ខេត្តក្រុង</label>

<div class="controls">

<select class="form-control " name="display_province" id="client_province" onchange="myclient_province()">

    <option value="24" <?php if($cat->display_province == 24){echo "selected";} ?> >រាជធានីភ្នំពេញ</option>
    <option value="23" <?php if($cat->display_province == 23){echo "selected";} ?> >កណ្ដាល</option>
    <option value="22" <?php if($cat->display_province == 22){echo "selected";} ?> >តាកែវ</option>
    <option value="21" <?php if($cat->display_province == 21){echo "selected";} ?> >កំពត</option>
    <option value="20" <?php if($cat->display_province == 20){echo "selected";} ?> >ព្រះសីហនុ</option>
    <option value="19" <?php if($cat->display_province == 19){echo "selected";} ?> >កោះកុង</option>
    <option value="18" <?php if($cat->display_province == 18){echo "selected";} ?> >កំពង់ស្ពឺ</option>
    <option value="17" <?php if($cat->display_province == 17){echo "selected";} ?> >កំពង់ឆ្នាំង</option>
    <option value="16" <?php if($cat->display_province == 16){echo "selected";} ?> >ពោធិ៍សាត់</option>
    <option value="15" <?php if($cat->display_province == 15){echo "selected";} ?> >ប៉ៃលិន</option>
    <option value="14" <?php if($cat->display_province == 14){echo "selected";} ?> >បាត់ដំបង</option>
    <option value="13" <?php if($cat->display_province == 13){echo "selected";} ?> >បន្ទាយមានជ័យ</option>
    <option value="12" <?php if($cat->display_province == 12){echo "selected";} ?> >ឧត្ដរមានជ័យ</option>
    <option value="11" <?php if($cat->display_province == 11){echo "selected";} ?> >សៀមរាប</option>
    <option value="10" <?php if($cat->display_province == 10){echo "selected";} ?> >ព្រះវិហារ</option>
    <option value="9" <?php if($cat->display_province == 9){echo "selected";} ?> >កំពង់ធំ</option>
    <option value="8" <?php if($cat->display_province == 8){echo "selected";} ?> >កំពង់ចាម</option>
    <option value="7" <?php if($cat->display_province == 7){echo "selected";} ?> >ស្វាយរៀង</option> 
    <option value="6" <?php if($cat->display_province == 6){echo "selected";} ?> >ព្រៃវែង</option>
    <option value="5" <?php if($cat->display_province == 5){echo "selected";} ?> >ត្បូងឃ្មុំ</option>
    <option value="4" <?php if($cat->display_province == 4){echo "selected";} ?> >ក្រចេះ</option>
    <option value="3" <?php if($cat->display_province == 3){echo "selected";} ?> >មណ្ឌលគិរី</option>
    <option value="2" <?php if($cat->display_province == 2){echo "selected";} ?> >រតនគិរី</option>
    <option value="1" <?php if($cat->display_province == 1){echo "selected";} ?> >ស្ទឹងត្រែង</option>
    <!-- <option value="ខេត្តកែប">កែប</option> -->
</select>

</div>

<br/>

<label class="control-label">ស្រុក/ខណ្ឌ</label>

<div class="controls">
<p id="iclient_district">
    <!-- District -->
<select class="form-control" name="display_district" id="client_district" onchange="myclient_district()" >
<!--        Phnom Penh-->
    @if($cat->display_district)
        <option value="{{ $cat->display_district }}">{{ $cat->display_district }}</option>
        <option>ជ្រើសរើរស​ ស្រុក/ខណ្ឌ</option>
    @else
        <option>ជ្រើសរើរស​ ស្រុក/ខណ្ឌ</option>
    @endif
        <option value="ចំការមន">ចំការមន</option>
        <option value="ដូនពេញ">ដូនពេញ</option>
        <option value="៧មករា">៧មករា</option>
        <option value="ទួលគោក">ទួលគោក</option>
        <option value="ដង្កោ">ដង្កោ</option>
        <option value="មានជ័យ">មានជ័យ</option>
        <option value="ឫស្សីកែវ">ឫស្សីកែវ</option>
        <option value="សែនសុខ">សែនសុខ</option>
        <option value="ពោធិ៍សែនជ័យ">ពោធិ៍សែនជ័យ</option>
        <option value="ជ្រោយចង្វារ">ជ្រោយចង្វារ</option>
        <option value="ព្រែកព្នៅ">ព្រែកព្នៅ</option>
        <option value="ច្បារអំពៅ">ច្បារអំពៅ</option>
    
<!--Kandal-->
        <option value="កណ្ដាលស្ទឹង">កណ្ដាលស្ទឹង</option>
        <option value="កៀនស្វាយ">កៀនស្វាយ</option>
        <option value="ខ្សាច់កណ្ដាល">ខ្សាច់កណ្ដាល</option>
        <option value="កោះធំ">កោះធំ</option>
        <option value="លើកដែក">លើកដែក</option>
        <option value="ល្វាឯម">ល្វាឯម</option>
        <option value="មុខកំពូល">មុខកំពូល</option>
        <option value="អង្គស្នួល">អង្គស្នួល</option>
        <option value="ពញាឮ">ពញាឮ</option>
        <option value="ស្អាង">ស្អាង</option>
        <option value="ក្រុងតាខ្មៅ">ក្រុងតាខ្មៅ</option>
<!--    Takeo-->
        <option value="អង្គរបូរី">អង្គរបូរី</option>
        <option value="បាទី">បាទី</option>
        <option value="បូរីជលសារ">បូរីជលសារ</option>
        <option value="គីរីវង់">គីរីវង់</option>
        <option value="កោះអណ្ដែត">កោះអណ្ដែត</option>
        <option value="ព្រៃកប្បាស">ព្រៃកប្បាស</option>
        <option value="សំរោង">សំរោង</option>
        <option value="ក្រុងដូនកែវ">ក្រុងដូនកែវ</option>
        <option value="ត្រាំកក់">ត្រាំកក់</option>
        <option value="ទ្រាំង">ទ្រាំង</option>
<!--    Kampot-->
        <option value="អង្គរជ័យ">អង្គរជ័យ</option>
        <option value="បន្ទាយមាស">បន្ទាយមាស</option>
        <option value="ឈូក">ឈូក</option>
        <option value="ជុំគិរី">ជុំគិរី</option>
        <option value="ដងទង់">ដងទង់</option>
        <option value="កំពង់ត្រាច">កំពង់ត្រាច</option>
        <option value="ទឹកឈូ">ទឹកឈូ</option>
        <option value="ក្រុងកំពត">ក្រុងកំពត</option>
<!--    Kampong Sue-->
        <option value="បរសេដ្ឋ">បរសេដ្ឋ</option>
        <option value="ក្រុងច្បារមន">ក្រុងច្បារមន</option>
        <option value="គងពិសី">គងពិសី</option>
        <option value="ឱរ៉ាល់">ឱរ៉ាល់</option>
        <option value="ឧដុង្គ">ឧដុង្គ</option>
        <option value="ភ្នំស្រួច">ភ្នំស្រួច</option>
        <option value="សំរោងទង">សំរោងទង</option>
        <option value="ថ្ពង">ថ្ពង</option>
        <option value="ផ្សេងៗ">ផ្សេងៗ</option>
</select>  
</p>
 <p id="other_district" ></p>
</div>