@extends('layouts.app')

@section('title', 'Quoting')

@section('content')

<div class="container rounded border p-5">

    <div class="row">
        <div class="col-sm-6 pb-4">
            
            <h6>Xceed Electrical</h6>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            Address: 271 Baker St Glenfield NSW 2199<br>
            Phone: 9827391874<br>
            Fax: 3287423984<br>
            Email: Hasjdaskjhasjhf@skdjfs<br>
            Website: xceedelectrical.com.au
        </div>
        <div class="col-sm-6">
            <img src="images/Xceed_logo_small_01-copy1.png" class="img-fluid float-right" width="350px"
                alt="Responsive image">
        </div>

        <!-- Forces next column to break new line -->
        <div class="w-100 border-top"></div>

        <div class="col-sm-6 pb-2">
            <form>

                <h5 class="pt-3 pb-1">Customer</h5>
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="input">Name</label>
                        <label class="sr-only" for="customerName">Vehicle</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="customerName"
                                placeholder="Enter Company/Customer Name">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-6 pb-2">
            <form>

                <h5 class="pt-3 pb-1">Quote Details</h5>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="quoteNumber">Quote Number</label>
                        <input type="text" class="form-control" id="quoteNumber" placeholder="######" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quoteDate">Date</label>
                        <input type="text" class="form-control" id="quoteDate" placeholder="10 September, 2020"
                            readonly>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-100"></div>

        <div class="col-sm-12">
            <form>
                <div class="form row border-top">
                    <div class="form-group col-md-2">
                    </div>
                    <h6 class="pt-3 pb-1 ml-2 pl-1">Product</h6>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-1">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="itemNo">#</label>
                        <input type="text" class="form-control" id="itemNo" placeholder="#" readonly>

                    </div>
                    <div class="form-group col-md">
                        <label for="selectCategory">Category</label>
                        <select class="form-control" id="selectCategory">
                            <option>Category</option>
                            <option>Category 1</option>
                            <option>Category 2</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="selectCategory">Sub-Category</label>
                        <select class="form-control" id="selectCategory">
                            <option>Sub-Category</option>
                            <option>Sub-Category 1</option>
                            <option>Sub-Category 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="selectItemNumber">Item Code</label>
                        <select class="form-control" id="selectItemNumber">
                            <option>######</option>
                            <option>######</option>
                            <option>######</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="selectItemSescription">Description</label>
                        <select class="form-control" id="selectItemDescription">
                            <option>Description</option>
                            <option>######</option>
                            <option>######</option>
                        </select>
                    </div>

                </div>

                <div class="form-row pb-2">
                    <div class="form-group col-md-2">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="input">Service Call</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="">
                        </div>
                    </div>

                    <div class="form-group col-md">
                        <label for="input">Estimated Hours</label>
                        <label class="sr-only" for="customerName">Vehicle</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" id="customerName" placeholder="Hours">
                        </div>
                    </div>

                    <div class="form-group col-md">
                        <label for="input">Labour Cost</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="">
                        </div>
                    </div>



                    <div class="form-group col-md">
                        <label for="selectCategory">Gross Margin</label>
                        <select class="form-control" id="materialGM">
                            <option>1.43%</option>
                            <option>########</option>
                            <option>########</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="input">Labour Charge</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="Cost x GM" readonly>
                        </div>
                    </div>

                </div>

                <div class="form row">
                    <div class="form-group col-md-4">
                    </div>
                    <h6 class="pt-3 pb-1 pl-1 ml-1">Materials</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    </div>
                    <div class="form-group col-md">
                        <label for="selectCategory">Description</label>
                        <select class="form-control" id="selectCategory">
                            <option>Description</option>
                            <option>########</option>
                            <option>########</option>
                        </select>
                    </div>

                </div>
                <div class="form-row pb-2">
                    <div class="form-group col-md-4">
                    </div>

                    <div class="form-group col-md">
                        <label for="yearlypay">Quantity</label>
                        <input type="text" class="form-control" id="yearlypay" placeholder="#">
                    </div>

                    <div class="form-group col-md">
                        <label for="input">Material Cost</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <label for="selectCategory">Gross Margin</label>
                        <select class="form-control" id="materialGM">
                            <option>1.43%</option>
                            <option>########</option>
                            <option>########</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="input">Material Charge</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="Cost x GM" readonly>
                        </div>
                    </div>


                </div>

                <div class="form row">
                    <div class="form-group col-md-6">
                    </div>
                    <h6 class="pt-3 pb-1 pl-1">Total Labour & Materials Cost</h6>
                </div>
                <!-- DISCOUNT ROW -->
                <!-- <div class="form-row">
                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md">
                        <label for="selectCategory">Discount</label>
                        <select class="form-control" id="selectCategory">
                            <option>Normal Pricing - No Discount</option>
                            <option>########</option>
                            <option>########</option>
                        </select>
                    </div>
                </div> -->
                <div class="form-row border-bottom pb-2">
                    <div class="form-group col-md-6">
                    </div>
                    <div class="form-group col-md">
                        <label for="input">Pre-margin</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="Total Cost" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md">
                        <label for="input">Post-Margin</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="Total Charge" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md">
                        <label for="input">Profit</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="Total Profit" readonly>
                        </div>
                    </div>

                </div>

                <div class="form row">
                    <div class="form-group col-md-8">
                    </div>
                    <h6 class="pt-3 pb-1 mt-2">Grand Total</h6>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                    </div>
                    <div class="form-group col-md">
                        <label for="selectCategory">Discount</label>
                        <select class="form-control" id="selectCategory">
                            <option>Normal Pricing - No Discount</option>
                            <option>########</option>
                            <option>########</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-8">
                    </div>
                    <div class="form-group col-md">
                        <label for="input">GST</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <label for="input">Price Inc GST</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="" readonly>
                        </div>
                    </div>
                </div>
                

                <!-- GST row -->
                <!-- <div class="form-row">
                    <div class="form-group col-md-8">
                    </div>
                    <div class="form-group col-md">
                        <label for="input">GST</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md">
                        <label for="input">Price Including GST</label>
                        <label class="sr-only" for="inlineFormInputGroup">2</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="employee_basehourly"
                                placeholder="" readonly>
                        </div>
                    </div>

                </div> -->
            </form>
        </div>

    </div>
</div>


<!-- <div class="float-left">
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
</div> -->

@stop
