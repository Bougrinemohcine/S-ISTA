<x-HeaderMenuStagiaire>
    @php
        $daysOfWeek = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        $daysPart = ["Matin", "Amidi"];
        $seancesPart = ["SE1", "SE2", "SE3", "SE4"];
    @endphp
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
                display: block ;
                max-width: 340px !important;
                position: absolute ;
                z-index: 10000001;
                top: -5.5rem ;
                left: 18rem ;

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
                position: absolute ;
                bottom: 0px ;
                margin: 0px ;
            }



        </style>

        {{-- <div  class="table-responsive   "> --}}
            <div style=" height:90vh"  >
                <div class="dateContent">
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
                {{-- <div  class="tableContainer">
                    <table id="test_table"  class="col-md-12 ">
                        <thead>
                            <tr class="day">
                                <th style="width: 105px !important"  rowspan="3">Groups Name</th>
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
                            @if ($groups)
                                @php
                                    $dayWeek = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                                @endphp
                                @foreach ($groups as $group)
                                    <tr>
                                        <td style="width: 130px ;" class="groupNAmeCase">{{ $group->group_name }}</td>
                                        @foreach ($dayWeek as $day)
                                            @foreach (['MatinSE1', 'MatinSE2', 'AmidiSE3', 'AmidiSE4'] as $sessionType)
                                                @php
                                                    $foundSession = false;
                                                @endphp
                                                @foreach ($sissions as $sission)
                                                    @if ($sission->day === $day &&
                                                        $sission->group_id === $group->id &&
                                                        $sission->day_part === substr($sessionType, 0, 5) &&
                                                        $sission->dure_sission === substr($sessionType, 5))
                                                        @php
                                                            $foundSession = true;
                                                        @endphp
                                                        <td
                                                            id="{{ $day.$sessionType.$group->id }}">
                                                        <span> {{ $sission->sission_type }}</span>
                                                            @if($sission->class_name)
                                                            {{ $sission->class_name }}
                                                            @else
                                                                SALLE
                                                            @endif
                                                        </br>
                                                        <span>{{ $sission->typeSalle }}</span>
                                                        <span>  {{ $sission->user_name }}</span>
                                                            {{ preg_replace('/^\d/' , ' ' , $sission->module_name ) }}
                                                        </td>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if (!$foundSession)
                                                    <td >
                                                    </td>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tr>

                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div> --}}

                <div class="tableContainer">
                    <table>
                        <style>

                            #SearchInput{
                                        width: 45% !important;
                                    }

                                    @media screen and (max-width: 600px){
                                        #SearchInput{
                                        width: 100% !important;
                                    }
                                    }
                            </style>
                            <thead>
                                <tr>
                                    <th style="width: 80px !important;" >Jours</th>
                                    <th style="width: 120px !important;">SE1</th>
                                    <th style="width: 120px !important;">SE2</th>
                                    <th style="width: 120px !important;">SE3</th>
                                    <th style="width: 120px !important;">SE4</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
                                $abbreviations = ['Lundi' => 'Mon',
                                'Mardi' => 'Tue',
                                'Mercredi' => 'Wed',
                                'Jeudi' => 'Thu',
                                'Vendredi' => 'Fri',
                                'Samedi' => 'Sat'];
                                $sessionData = ['Formateur', 'Module', 'Salle' ,'type Séance' ,'Groupe'];


                                @endphp

                                @foreach ($days as $day)

                                <tr style="border: 1px solid black" >

                                    <td >{{ $day }}</td>


                                    @foreach (['SE1', 'SE2', 'SE3', 'SE4'] as $dure)
                                        @php
                                            $moduleValue ;
                                            $sessionFound = false ;
                                            $SalleValue ;
                                            $Sessiontype ;
                                            $FormateurName ;
                                        @endphp
                                        @foreach ($sissions as $sission)
                                            @if ($sission->day === $abbreviations[$day] && $sission->dure_sission === $dure)
                                                @php
                                                    $sessionFound =  true ;
                                                    $moduleValue =   preg_replace('/^\d+/', '', $sission->module_name );
                                                    $SalleValue =    $sission->class_name    ;
                                                    $typeSalle =     $sission->typeSalle     ;
                                                    $SessionType =   $sission->sission_type  ;
                                                    $FormateurName = $sission->user_name     ;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($sessionFound)
                                        <td>

                                                      <span>  {{$FormateurName}}</span>
                                                         <span>{{  $moduleValue }}</span>
                                                  <span>  {{ $SalleValue . "\n" . $typeSalle }}</span>


                                                      <span>  {{$SessionType}}</span>


                                        </td>
                                        @else
                                        <td></td>
                                        @endif


                                    </td>

                                    @endforeach
                                </tr>



                                @endforeach



                            </tbody>

                    </table>
                </div>
            </div>


            {{-- <div style="margin: 10px ;">
                <button id="generate-excel"  class=" btn w-25 btn-primary mt-5">  télécharger</button>
                  <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger mt-5 col-3" data-bs-toggle="modal" data-bs-target="#exampleModal1"> Supprimer tout</button>
            </div>
              <!-- Modal for delete-->
              <div wire:ignore class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Êtes-vous sûr(e)?</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous supprimer toutes les sessions que vous avez créées ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                      <button type="button" wire:click='deleteAllSessions' class="btn btn-danger">Oui Supprimer Tout</button>
                    </div>
                  </div>
                </div>
              </div> --}}


              {{-- <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script> --}}
              {{-- <script type="text/javascript" > --}}

            {{-- //   function ExportToExcel(type, fn, dl) {
            //          var elt = document.getElementById('tbl_exporttable_to_xls');
            //          var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            //          return dl ?
            //            XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
            //            XLSX.writeFile(wb, fn || ('Schedule.' + (type || 'xlsx')));
            //       }


                     $("document").ready(function () {
                    excel = new ExcelGen({

                        "src_id" : "test_table",
                        "show_header" : "true"

                    });

                    $("#generate-excel").click(function () {
                        excel.generate();
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
            }); --}}

                {{-- </script> --}}

            {{-- </div> --}}

</x-HeaderMenuStagiaire>
