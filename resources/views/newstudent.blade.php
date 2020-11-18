@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Register New Student - {{ucwords($shule->name)}} </h5>
            <hr>
        </div>
    </div> <br>
    @if(Session::has('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get('message') }}</li>
                </ul>
            </div> <br>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                 <ul class="alert alert-danger" style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li><?php echo $error; ?></li>
                    @endforeach
                </ul>
            </div> <br>
        @endif
   <div class="card">
       <div class="card-body">
           <p class="card-text">
               <form action="{{route('savestudent')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div id="cont">

                </div>
                <input id="totalmaterials" type="text" name="totalinputs" value="" hidden>
                <input type="text" name="shule" id="" value="{{$shule->id}}" hidden>
                <p>
                    <div class="row">
                        <div class="col">
                            <a id="addRow" onclick="addRow()" class="btn btn-outline-info"><i class="fa fa-plus"></i> Add New Row</a>
                        </div>
                    </div><br>
                    <div class="row">

                        <div class="col">
                            <button id="bt" type="submit" class="btn btn-primary" disabled>Submit</button>&nbsp;
                            <a  href="{{route('schools')}}" class="btn btn-danger">Cancel</a>

                        </div>
                    </div>
                </p>
               </form>
           </p>
       </div>
   </div>
</div>


<script>
    // ARRAY FOR HEADER.
    var arrHead = new Array();
    arrHead = ['','Name', 'Age','Class', 'Stream', ];      // SIMPLY ADD OR REMOVE VALUES IN THE ARRAY FOR TABLE HEADERS.

    // FIRST CREATE A TABLE STRUCTURE BY ADDING A FEW HEADERS AND
    // ADD THE TABLE TO YOUR WEB PAGE.
    function createTable() {
        var MatForm = document.createElement('table');
        MatForm.setAttribute('id', 'MatForm');
        MatForm.setAttribute('class', 'table');            // SET THE TABLE ID.

        var tr = MatForm.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th');


            if(h==2){
                	th.setAttribute('style','width:95px;');
                }


                     // TABLE HEADER.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(MatForm);    // ADD THE TABLE TO YOUR WEB PAGE.

        var empTab = document.getElementById('MatForm');

        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 0) {           // FIRST COLUMN.
                 // ADD A BUTTON.
                var button = document.createElement('button');

                // SET INPUT ATTRIBUTE.
                button.setAttribute('type', 'button');
                button.setAttribute('class', 'btn btn-danger');
                if(c==0)
                {
                    button.setAttribute('disabled', 'true');

                }
                // ADD THE BUTTON's 'onclick' EVENT.
                button.setAttribute('onclick', 'removeRow(this)');

                td.appendChild(button);

                var i = document.createElement('i');
                	i.setAttribute('class', 'fa fa-trash');
                	button.appendChild(i);
            }
            else {
                // CREATE AND ADD TEXTBOX IN EACH CELL.
               if(c==3)
                {
                        var ele = document.createElement('select');
                }else
                {
                    var ele = document.createElement('input');
                }
                if(c==1){
                    ele.setAttribute('onClick','reply_click(this.id)');
                    ele.setAttribute('required', '');
                }
                if(c==2){
                    ele.setAttribute('onClick','reply_click1(this.id)');
                }

                ele.setAttribute('id',c);
                if(c==2){
                    ele.setAttribute('type', 'number');
                    ele.setAttribute('min', '10');
                    ele.setAttribute('max', '100');
                    ele.setAttribute('style','width:120px;');
                    ele.setAttribute('required', '');
                }
                else{
                    ele.setAttribute('type', 'text');
                }



                if(c==3){
                    ele.setAttribute('style','width:100px;');
                    ele.setAttribute('required', '');
                }
                if(c==4){
                    ele.setAttribute('style','width:220px;');
                }


                ele.setAttribute('class', 'form-control');
                ele.setAttribute('name',c);

                ele.setAttribute('id',c);



    var value = parseInt(document.getElementById('totalmaterials').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('totalmaterials').value = value;

    var hide = document.getElementById('bt');
        if (value > 1) {
            hide.disabled = false;
        }
        else {
            hide.disabled = true;
        }

            ele.setAttribute('value', '');
            ele.setAttribute('name',value);
            ele.setAttribute('id',value);
            td.appendChild(ele);

            if(c==3)
                {
                    var option = document.getElementById(value);


                    var options = document.createElement('option');
                    options.setAttribute('value','Form 1');
                    options.text = "Form 1";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 2');
                    options.text = "Form 2";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 3');
                    options.text = "Form 3";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 4');
                    options.text = "Form 4";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 5');
                    options.text = "Form 5";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 6');
                    options.text = "Form 6";
                    option.appendChild(options);
                }

            }
        }


    }

    // ADD A NEW ROW TO THE TABLE.s
    function addRow() {
        var empTab = document.getElementById('MatForm');

        var rowCnt = empTab.rows.length;        // GET TABLE ROW COUNT.
        var tr = empTab.insertRow(rowCnt);      // TABLE ROW.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 0) {           // FIRST COLUMN.
                // ADD A BUTTON.
                var button = document.createElement('button');

                // SET INPUT ATTRIBUTE.
                button.setAttribute('type', 'button');
                button.setAttribute('class', 'btn btn-danger');

                // ADD THE BUTTON's 'onclick' EVENT.
                button.setAttribute('onclick', 'removeRow(this)');

                td.appendChild(button);

                var i = document.createElement('i');
                	i.setAttribute('class', 'fa fa-trash');
                	button.appendChild(i);
            }
           else {
                // CREATE AND ADD TEXTBOX IN EACH CELL.
                if(c==3)
                {
                        var ele = document.createElement('select');
                }else
                {
                    var ele = document.createElement('input');
                }
                if(c==1){
                    ele.setAttribute('onClick','reply_click(this.id)');
                    ele.setAttribute('required', '');
                }
                if(c==2){
                    ele.setAttribute('onClick','reply_click1(this.id)');
                }

                ele.setAttribute('id',c);
                if(c==2){
                    ele.setAttribute('type', 'number');
                    ele.setAttribute('min', '10');
                    ele.setAttribute('max', '100');
                    ele.setAttribute('style','width:120px;');
                    ele.setAttribute('required', '');
                }
                else{
                    ele.setAttribute('type', 'text');
                }



                if(c==3){
                    ele.setAttribute('style','width:100px;');
                    ele.setAttribute('required', '');
                }
                if(c==4){
                    ele.setAttribute('style','width:220px;');
                }


                ele.setAttribute('class', 'form-control');
                ele.setAttribute('name',c);

                ele.setAttribute('id',c);



    var value = parseInt(document.getElementById('totalmaterials').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('totalmaterials').value = value;

    var hide = document.getElementById('bt');
        if (value > 1) {
            hide.disabled = false;
        }
        else {
            hide.disabled = true;
        }

            ele.setAttribute('value', '');
            ele.setAttribute('name',value);
            ele.setAttribute('id',value);
            td.appendChild(ele);

            if(c==3)
                {
                    var option = document.getElementById(value);


                    var options = document.createElement('option');
                    options.setAttribute('value','Form 1');
                    options.text = "Form 1";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 2');
                    options.text = "Form 2";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 3');
                    options.text = "Form 3";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 4');
                    options.text = "Form 4";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 5');
                    options.text = "Form 5";
                    option.appendChild(options);

                    var options = document.createElement('option');
                    options.setAttribute('value','Form 6');
                    options.text = "Form 6";
                    option.appendChild(options);
                }

            }
        }


    }

    // DELETE TABLE ROW.
    function removeRow(oButton) {
        var empTab = document.getElementById('MatForm');
    var value = parseInt(document.getElementById('totalmaterials').value, 10);
    value = isNaN(value) ? 0 : value;
    --value; --value; --value; --value;
    document.getElementById('totalmaterials').value = value;
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex);

var value = parseInt(document.getElementById('totalmaterials').value, 10);
    value = isNaN(value) ? 0 : value;

    var hide = document.getElementById('bt');
        if (value > 1) {
            hide.disabled = false;
        }
        else {
            hide.disabled = true;
        }
              // BUTTON -> TD -> TR.
    }

    // EXTRACT AND SUBMIT TABLE DATA.
    function submit() {
        var myTab = document.getElementById('MatForm');
        var values = new Array();

        // LOOP THROUGH EACH ROW OF THE TABLE.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            for (c = 0; c < myTab.rows[row].cells.length; c++) {   // EACH CELL IN A ROW.

                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {
                    values.push("'" + element.childNodes[0].value + "'");
                }
            }
        }

        // SHOW THE RESULT IN THE CONSOLE WINDOW.
        console.log(values);
    }



</script>
@endsection
