@extends('layouts.app')

@section('title', 'Quoting')

@section('content')
<div class="float-left">
    <div class="container">
        <div class="row">
            <div class="col-sm border">Xceed Business Details</div>
            <div class="col-sm border">Logo</div>
            <div class="w-100"></div>
            <div class="col-sm border">Customer Details</div>
            <div class="col-sm border">Quote Details, balance quote no etc</div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-1 border">#</div>
            <div class="col-sm-11 border">
                <div class="row">
                   
                        <div class="form-group col-sm-4">
                            <label for="input">Category</label>
                            <input type="text" class="form-control" id="category" placeholder="Category">
                        </div>
               
                
                        <div class="form-group col-sm">
                            <label for="input">Sub-Category</label>
                            <input type="text" class="form-control" id="subcategory" placeholder="Sub-Category">
                        </div>
   
                    <div class="w-100"></div>
                    <div class="form-group col-sm-4">
                            <label for="input">Item Code</label>
                            <input type="text" class="form-control" id="itemCode" placeholder="Item Code">
                        </div>

                        <div class="form-group col-sm">
                            <label for="input">Description</label>
                            <input type="text" class="form-control" id="description" placeholder="Description">
                        </div>
              
                    <div class="w-100"></div>
              
                        <div class="form-group col-sm">
                            <label for="input">Type</label>
                            <input type="text" class="form-control" id="jobType" placeholder="Job Type">
                        </div>
               
                    <div class="w-100"></div>
                  
                        <div class="form-group col-sm">
                            <label for="input">Labour</label>
                            <input type="text" class="form-control" id="labour" placeholder="Labour">
                        </div>
          
            
                        <div class="form-group col-sm">
                            <label for="input">Estimated Time</label>
                            <input type="text" class="form-control" id="time" placeholder="Estimate">
                        </div>
      
                        <div class="form-group col-sm">
                            <label for="input">Service Call</label>
                            <input type="text" class="form-control" id="serviceCall" placeholder="Service Call">
                        </div>
     
      
                        <div class="form-group col-sm">
                            <label for="input">Discount</label>
                            <input type="text" class="form-control" id="discount" placeholder="Discount">
                        </div>
 
                    <div class="w-100"></div>
                
                        <div class="form-group col-sm">
                            <label for="input">Material Cost</label>
                            <input type="text" class="form-control" id="materialCost" placeholder="Material Cost">
                        </div>
          
               
                        <div class="form-group col-sm">
                            <label for="input">Material Name</label>
                            <input type="text" class="form-control" id="materialName" placeholder="Material Name">
                        </div>
      
                  
                        <div class="form-group col-sm">
                            <label for="input">GM %</label>
                            <input type="text" class="form-control" id="gm" placeholder="GM%">
                        </div>
              
                
                        <div class="form-group col-sm">
                            <label for="input">Material Cost</label>
                            <input type="text" class="form-control" id="materialCost" placeholder="Material Cost">
                        </div>
            
                    <div class="w-100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container border">
        <div class="row">

        </div>
    </div>
</div>

@stop