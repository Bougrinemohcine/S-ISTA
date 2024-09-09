
<div style="z-index: 2222222222" wire:ignore.self  class="modal fade col-9 ModelBody wrapper" id="exampleModal" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true" >
<div class="modal-dialog  modal-md  ">
   <div class="modal-content  col-9">
       <div class="modal-header header">
           <h1 class="modal-title fs-5" >
               Creation de séance </h1>
               @if ($errors->any())
               @foreach ( $errors->all() as $error)
               <div id="liveAlertPlaceholder" class="alert alert-danger">
                   {{$error}}
               </div>
         @endforeach
         @endif
           <button type="button" class="btn-close" data-bs-dismiss="modal"
               aria-label="Close"></button>
       </div>

       <form wire:submit.prevent='UpdateSession'>
           <div class="modal-body">
               <div style="display: flex">
                      {{-- Formateur --}}
                      @if (!$checkValues[0]->formateur)
                      @if ($formateurs)
                      <select wire:model='formateur' class="form-select"
                          aria-label="Default select example">
                          <option selected>Formateurs</option>
                              @foreach ($formateurs as $formateur)
                                  <option value="{{ $formateur->id }}">
                                      {{ $formateur->user_name }}</option>
                              @endforeach

                      </select>
                      @endif
                      @endif
               </div>
               <div style="display: flex">
                    {{-- module  content --}}
                    @if (!$checkValues[0]->module)
                    <select wire:model="module" class="form-select "
                    aria-label="Default select example">
                    <option selected>Modules</option>
                    @if ($modules)
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}">
                               {{ preg_replace('/^\d+/' , '' ,$module->id )}}</option>
                        @endforeach
                    @endif
                </select>
                @endif
                   {{-- salle --}}
                   @if (!$checkValues[0]->salle)
                   <select wire:model="salle" class="form-select"
                       aria-label="Default select example">
                       <option selected>les salles</option>
                       @if ($salles)
                           @foreach ($salles as $salle)
                               <option value="{{ $salle->id }}">
                                   {{ $salle->class_name }}</option>
                           @endforeach
                       @endif
                   </select>
                   @endif
               </div>
               {{-- tyope session --}}
               <div style="display: flex;justify-content: space-between">

                   @if (!$checkValues[0]->typeSalle)
                   <select wire:model="salleclassTyp" class="form-select"
                       aria-label="Default select example">
                       <option  selected> Type Salle</option>
                       @if ($classType)
                           @foreach ($classType as $classTyp)
                               <option value="{{ $classTyp->class_room_types }}">
                                   {{ $classTyp->class_room_types }}</option>
                           @endforeach
                       @endif
                   </select>
                   @endif

                   {{-- id case --}}
                   <input type="hidden"   value="{{$receivedVariable}}" >
               </div>
               {{-- day part && type sission --}}
               <div style="display: flex">
                   @if (!$checkValues[0]->typeSession)
                   <select wire:model="TypeSesion" class="form-select"
                       aria-label="Default select example">
                       <option selected>Type Séance</option>
                       <option value="PRESENTIEL">Presentielle</option>
                       <option value="teams">Teams</option>
                       <option value="EFM">EFM</option>

                   </select>
                   @endif
               </div>
           </div>
           <div class="modal-footer">


                   @if ($isCaseEmpty)
                      <button id="SaveAndUpdate" data-bs-dismiss="modal" type="submit" class="btn btn-primary">
                       Save
                      </button>
                   @else
                      <button id="SaveAndUpdate" data-bs-dismiss="modal" type="submit" class="btn btn-success ">
                       Update
                      </button>
                      <button data-bs-dismiss="modal" wire:click="DeleteSession" aria-label="Close" type="button"  class="btn btn-danger">supprimer</button>

                   @endif


           </div>
       </form>

</div>

</div>

<script>
 const wrapper = document.querySelector(".wrapper"),
 header = wrapper.querySelector(".header");

 function onDrag({movementX, movementY}){
   let getStyle = window.getComputedStyle(wrapper);
   let leftVal = parseInt(getStyle.left);
   let topVal = parseInt(getStyle.top);
   wrapper.style.left = `${leftVal + movementX}px`;
   wrapper.style.top = `${topVal + movementY}px`;
 }

 header.addEventListener("mousedown", ()=>{
   header.classList.add("active");
   header.addEventListener("mousemove", onDrag);
 });

 document.addEventListener("mouseup", ()=>{
   header.classList.remove("active");
   header.removeEventListener("mousemove", onDrag);
 });
</script>



