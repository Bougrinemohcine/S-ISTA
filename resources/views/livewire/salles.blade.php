<div>
    <style>
         .Mon{
            background-color: RGBa(80, 159, 236,0.2) !important;
        }
        .Tue{
            background-color: rgb(255, 224, 178) !important;
        }
        .Wed{
            background-color: rgb(200, 230, 201) !important;
        }
        .Thu{
            background-color: rgb(255, 205, 210) !important;
        }
        .Fri{
            background-color: rgb(232, 234, 246) !important;
        }
        .Sat{
            background-color: rgb(178, 235, 242) !important;
        }
          .dateContent{
            width: 85vw ;
            display: flex ;
            justify-content: space-between ;
            position: absolute ;
            top: -2.5rem ;
            color: white ;
        }
        .SEvalues{
                display: block
            }
        @media screen and (max-width:1200px){
            .SEvalues{
                display: none
            }
        }
        @media screen and (max-width:600px){
            .dateContent{

            width: 95vw ;
            display: flex ;
            flex-direction: column
        }
        .data{
            margin-top:5px
        }
        }

        #SearchInputContainer{

            max-width: 340px !important;
            position: absolute ;
            z-index: 10000001;
            top: -5.5rem ;
            left: 18rem ;

        }

        .ContainerInputs{
            display: flex ;
        }
        .iconContainer {
            color: white ;
            display: none;
            font-size:28px ;
            position: absolute ;
            top:-5.6rem ;
            left :75% ;
            transform:translate('0%' , '80%') ;
            z-index:30033 ;
            cursor: pointer;
        }
        @media screen and (max-width: 600px){
            #SearchInputContainer{
           display: none
        }
        .iconContainer{
            display: block ;
        }
        }
        .tableContainer{
            width: 100% !important;
            height:100% !important;
            overflow: scroll;
            position: absolute ;
            bottom: 0px ;
            margin: 0px ;
        }



    </style>

    @php

@endphp


    {{-- <div  class="table-responsive   "> --}}
        <div style=" height:90vh"  >
            <style>
                th:first-child {
                left: 0;
                z-index: 1;
                }
                td:first-child {
                    position: sticky;
                    top: 110px ;
                    left: 0;
                    background-color: #f2f2f2;
                    z-index: 1;
                }
            </style>
             <div class=" iconContainer rounded">
                <div class="mdi mdi-magnify-remove-outline tbn" data-bs-toggle="modal" data-bs-target="#exampleModal333"></div>
            </div>

             {{-- modal Search --}}
            <div wire:ignore class="modal fade" id="exampleModal333" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Search Groupe</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input wire:model='SearchValue'  type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <select id='date-select' class="form-select"  wire:model="selectedValue" wire:change="updateSelectedIDEmploi($event.target.value)">
                            <option >Select date emploi</option>
                            @forEach( $Main_emplois as $Main_emploi)
                                <option value="{{ $Main_emploi->id }}">{{$Main_emploi->datestart  }} to {{$Main_emploi->dateend }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>

                    </div>
                  </div>
                </div>
              </div>

            {{-- modal Search --}}
            <div style="margin-left:66px ;" id="SearchInputContainer" class="ContainerInputs rounded">
                {{-- <input wire:model='SearchValue'   type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" /> --}}
                <select id='date-select' class="form-select" style="margin-left:1.5px ;height: 100% ; width:200px"  wire:model="selectedValue" wire:change="updateSelectedIDEmploi($event.target.value)">
                    <option >Select date emploi</option>
                    @forEach( $Main_emplois as $Main_emploi)
                        <option value="{{ $Main_emploi->id }}">{{$Main_emploi->datestart  }} to {{$Main_emploi->dateend }}</option>
                    @endforeach
                </select>
            </div>

            <div class="dateContent">
                @if ($this->checkValues[0]->modeRamadan)
                <h4 class="SEvalues" style="marign-top:15px " >
                    SE1 = 08:30 - 10:20 SE2 = 10:25 - 12:15 SE3 = 12:45 - 14:35 SE4 = 14:40 - 16:30
                </h4>
                @else
                <h4 class="SEvalues"> SE1 = 08:30 - 11:20 SE2 = 11:30 - 13:30 SE3 = 13:30 - 16:20 SE4 = 16:30 - 18:30 </h4>
                @endif



                    @if (!$dataEmploi->isEmpty())
                    <h4 class='data' style="float: right; ">
                        @foreach ($dataEmploi as $item)
                            Du: {{ $item->datestart }} au {{ $item->dateend }}
                        @endforeach
                    </h4>
                    @else
                    <h4 class='data' style="float: right;  padding: 0px 5px 0px 5px;
                     border-radius: 3px; background-color: #dc3545; color: white;">
                        Il faut créer un emploi
                    </h4>
                    @endif


             </div>

        <div  class="tableContainer">



        <table id="myTable"  class="col-md-12 ">


            <thead>


                <tr class="day">
                    <th style="width: 105px !important"  rowspan="3">SALLES Name</th>
                    <th colspan="4">Lundi</th>
                    <th colspan="4">Mardi</th>
                    <th colspan="4">Mercredi</th>
                    <th colspan="4">Jeudi</th>
                    <th colspan="4">Vendredi</th>
                    <th colspan="4">Samedi</th>
                </tr>
                <tr>

                  <th colspan="2">Matin </th>
                  <th colspan="2">A.midi </th>
                  <th colspan="2">Matin </th>
                  <th colspan="2">A.midi </th>
                  <th colspan="2">Matin </th>
                  <th colspan="2">A.midi </th>
                  <th colspan="2">Matin </th>
                  <th colspan="2">A.midi </th>
                  <th colspan="2">Matin </th>
                  <th colspan="2">A.midi </th>
                  <th colspan="2">Matin </th>
                  <th colspan="2">A.midi </th>
                </tr>
                <tr class="se-row">

                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>
                    <th>SE1</th>
                    <th>SE2</th>

                </tr>
              </thead>
              <tbody>
                @if ($salles)
                @php
                     $dayWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                @endphp
                @foreach ($salles as $salle)
                <tr>
                    <td style="width: 130px ;" class="groupNAmeCase">{{ $salle->class_name }}</td>
                    @foreach ($dayWeek as $day)
                        @foreach (['MatinSE1', 'MatinSE2', 'AmidiSE3', 'AmidiSE4'] as $sessionType)
                            @php
                                $foundSession = false;
                            @endphp
                            @foreach ($sissions as $sission)
                                @if ($sission->day === $day &&
                                     $sission->class_room_id === $salle->id &&
                                     $sission->day_part === substr($sessionType, 0, 5) &&
                                     $sission->dure_sission === substr($sessionType, 5))
                                    @php
                                        $foundSession = true;
                                    @endphp
                                    <td wire:click="updateCaseStatus(false , true)"
                                        colspan="1" rowspan="1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        class="TableCases {{$day}}"
                                        style="background-color:{{ $isActive ? 'rgba(12, 72, 166, 0.3)' :  ''}} ;"
                                        id="{{ $day.$sessionType.$salle->id }}">
                                        <span> {{ $sission->group_name }}</span>
                                    </br>
                                      <span>{{ $sission->typeSalle }}</span>
                                      <span>  {{ $sission->user_name }}</span>
                                        {{ preg_replace('/^\d/' , ' ' , $sission->module_name ) }}
                                    </td>
                                    @break
                                @endif
                            @endforeach
                            @if (!$foundSession)
                                <td wire:click="updateCaseStatus(true , true)"
                                    colspan="1" rowspan="1"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    class="TableCases {{$day}}"
                                    id="{{ $day.$sessionType.$salle->id }}">
                                </td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>

                @endforeach

                @endif
            </tbody>
        </table>

    </div>
     </div>
    </div>
</div>


<div style="margin: 10px ;">
    <button id="exportButton"  class=" btn w-25 btn-primary mt-5">  télécharger</button>
      <!-- Button trigger modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <script type="text/javascript" >
     $(document).ready(function () {
    $("#exportButton").click(function () {
        var table = document.getElementById("myTable");

        // Modify the content of each cell in the HTML table to include line breaks
        $(table).find("td").each(function() {
            var cellContent = $(this).text();
            // Replace spaces with line breaks
            cellContent = cellContent.replace(/\s+/g, "\n");
            $(this).text(cellContent);
        });

        // Convert the modified table to a workbook
        var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

        // Define the row heights
        var ws = wb.Sheets["Sheet1"];
        var wsrows = [
            { hpt: 25 }, { hpx: 25 }, { hpx: 25 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
            { hpx: 45 }, { hpx: 45 }, { hpx: 45 }, { hpx: 45 },
        ];
        ws['!rows'] = wsrows;

         // Define the column widths
        var wscols = [
            { wch: 10 },
            {wch: 9 } ,  {wch: 9 } , {wch: 9 } , {wch: 9 } , {wch: 9 }, {wch: 9 }, {wch: 9 },
              {wch: 9 } ,  {wch: 9 } , {wch: 9 } , {wch: 9 } , {wch: 9 }, {wch: 9 }, {wch: 9 },
                {wch: 9 } ,  {wch: 9 } , {wch: 9 } , {wch: 9 } , {wch: 9 }, {wch: 9 }, {wch: 9 },
                  {wch: 9 } ,  {wch: 9 } , {wch: 9 } , {wch: 9 } , {wch: 9 }, {wch: 9 }, {wch: 9 },
                    {wch: 9 } ,  {wch: 9 } , {wch: 9 } , {wch: 9 } , {wch: 9 }, {wch: 9 }, {wch: 9 },
                      {wch: 9 } ,  {wch: 9 } , {wch: 9 } , {wch: 9 } , {wch: 9 }, {wch: 9 }, {wch: 9 },
        ];
        ws['!cols'] = wscols;



        // Write the workbook to a file
        XLSX.writeFile(wb, "istabm.xlsx");
    });
});

  document.addEventListener('livewire:load', function () {
  const selectElement = document.getElementById('date-select');
  selectElement.addEventListener('change', function() {
      Livewire.emit('receiveidEmploiid', selectElement.value);
  });

  let elements = document.querySelectorAll('[data-bs-toggle="modal"], .Cases');
  elements.forEach(element => {
      element.addEventListener('click', function() {
          if (element.classList.contains('Cases')) {
              Livewire.emit('receiveVariable', element.id);
          }
      });
  });
});



    document.addEventListener('livewire:load', function () {
            let elements = document.querySelectorAll('[data-bs-toggle="modal"]');
            elements.forEach(element => {
                element.addEventListener('click', function() {
                    Livewire.emit('receiveVariable', element.id);
                });
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            const handleDomChanges = function(mutationsList, observer) {
            let elements = document.querySelectorAll('[data-bs-toggle="modal"]');
            elements.forEach(element => {
                element.addEventListener('click', function() {
                    Livewire.emit('receiveVariable', element.id);

                });
            });

            };
                const observerConfig = { childList: true, subtree: true };
                const observer = new MutationObserver(handleDomChanges);
                observer.observe(document.body, observerConfig);
});

    </script>

</div>
