<!DOCTYPE html>
<html>
<?php include('tags/header.php'); ?>
<body>
<?php include('tags/navigation.php');?>
<div class="app-main__outer">
    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="fa fa-address-book icon-gradient bg-amy-crisp">
                                        </i>
                                    </div>
                                    <div>Network and cryptography Department</div>
                                </div>
                            </div>
                        </div>
<div class="unit w-2-3">
   <div class="hero-callout">
      <div id="example_wrapper" class="dataTables_wrapper">
         <div class="dataTables_length" id="example_length">
            <label>
               Show 
               <select name="example_length" aria-controls="example" class="">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
               </select>
               entries
            </label>
         </div>
         <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div>
         <table id="example" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" role="grid" aria-describedby="example_info">
            <thead>
               <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 119px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 190px;" aria-label="Position: activate to sort column ascending">Article name</th>
                  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 88px;" aria-label="Office: activate to sort column ascending">Submitted date</th>
                  <th class="dt-body-right sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 34px;" aria-label="Age: activate to sort column ascending">Action</th>
               </tr>
            </thead>
            <tbody>
               <tr role="row" class="odd">
                  <td tabindex="0" class="sorting_1">Airi Satou</td>
                  <td>Accountant</td>
                  <td>22 Sep,2020</td>
                  <td class="btn btn-warning">download</td>
                  
               </tr>
               <tr role="row" class="even">
                  <td class="sorting_1" tabindex="0">Angelica Ramos</td>
                  <td>Chief Executive Officer (CEO)</td>
                  <td>22 Sep,2020</td>
                 <td class="btn btn-warning">download</td>
                  
               </tr>
    
            </tbody>
            <tfoot>
               <tr>
                  <th rowspan="1" colspan="1">Name</th>
                  <th rowspan="1" colspan="1">Article Name</th>
                  <th rowspan="1" colspan="1">Submitted Date</th>
                  <th class="dt-body-right" rowspan="1" colspan="1">Action</th>
               </tr>
            </tfoot>
         </table>
         <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div>
         <div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="-1" id="example_previous">Previous</a><span><a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="example" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="example" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a></div>
      </div>
   </div>
</div>
                        
<?php include('tags/footer.php');?>
    </div>
</div>

</body>
</html>