<?php

			if(isset($_GET['page']))
			{
				$page=$_GET['page'];	
			}

?>
<div>

               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12 sortable">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Form Layouts</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="" class="form-horizontal" method="post">
                    			<div class="control-group">
                                    <label class="control-label">Enter Catagory Name</label>
                                    <div class="controls">
                                        <input name="catagory" type="text" class="input-large" id="catagory" placeholder="Catagory Name" />
                                        <!-- <span class="help-inline">Some hint here</span> -->
                                    </div>
                                </div>
                                <div class="form-actions">
                                     <button type="submit" class="btn btn-success" name="submit">Save</button>
                                    <button type="reset" class="btn"><i class=" icon-remove"></i> Cancel</button>
                                </div>
                            </form>
                            <!-- END FORM--> 
                        </div>
                    </div>

</div>