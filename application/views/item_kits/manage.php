<?php $this->load->view("partial/header"); ?>
<?php $this->load->view("partial/menu_left_sidebar"); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <h3><?php echo $this->lang->line('common_list_of').' '.$this->lang->line('module_'.$controller_name); ?></h3>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="active">Dashboard</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Penjualan Baru</h3>
            </div> -->
            <div class="box-body">

							<script type="text/javascript">
							$(document).ready(function()
							{
							    init_table_sorting();
							    enable_select_all();
							    enable_checkboxes();
							    enable_row_selection();
							    enable_search({suggest_url : '<?php echo site_url("$controller_name/suggest")?>',
												confirm_message : '<?php echo $this->lang->line("common_confirm_search")?>'});
							    enable_delete('<?php echo $this->lang->line($controller_name."_confirm_delete")?>','<?php echo $this->lang->line($controller_name."_none_selected")?>');

							    $('#generate_barcodes').click(function()
							    {
							    	var selected = get_selected_values();
							    	if (selected.length == 0)
							    	{
							    		alert('<?php echo $this->lang->line('items_must_select_item_for_barcode'); ?>');
							    		return false;
							    	}

							    	$(this).attr('href','index.php/item_kits/generate_barcodes/'+selected.join(':'));
							    });
							});

							function init_table_sorting()
							{
								//Only init if there is more than one row
								if($('.tablesorter tbody tr').length >1)
								{
									$("#sortable_table").tablesorter(
									{
										sortList: [[1,0]],
										headers:
										{
											0: { sorter: false},
											6: { sorter: false}
										}
									});
								}
							}

							function post_item_kit_form_submit(response)
							{
								if(!response.success)
								{
									set_feedback(response.message,'error_message',true);
								}
								else
								{
									//This is an update, just update one row
									if(jQuery.inArray(response.item_kit_id,get_visible_checkbox_ids()) != -1)
									{
										update_row(response.item_kit_id,'<?php echo site_url("$controller_name/get_row")?>');
										set_feedback(response.message,'success_message',false);

									}
									else //refresh entire table
									{
										do_search(true,function()
										{
											//highlight new row
											hightlight_row(response.item_kit_id);
											set_feedback(response.message,'success_message',false);
										});
									}
								}
							}
							</script>
							<div class="row">
				               <div class="col-md-4">
				               </div>
				               <div class="col-md-4">
				               </div>

				               <div class="col-md-2">
				               </div>
				               <div class="col-md-2">
				                   <?php echo anchor("$controller_name/view/-1/width:$form_width",
									"<div class='btn btn-block btn-success btn-sm' style='float: left;'><span>".$this->lang->line($controller_name.'_new')."</span></div>",
									array('class'=>'thickbox none','title'=>$this->lang->line($controller_name.'_new')));
									?>
				                </div>
				             </div>
							

							<div id="pagination"><?= $links ?></div>
							<?php echo form_open("$controller_name/search",array('id'=>'search_form')); ?>
							<div id="table_action_header">
								<ul>
									<li class="float_left"><span><?php echo anchor("$controller_name/delete",$this->lang->line("common_delete"),array('id'=>'delete')); ?></span></li>
									<li class="float_left"><span><?php echo anchor("$controller_name/generate_barcodes",$this->lang->line("items_generate_barcodes"),array('id'=>'generate_barcodes', 'target' =>'_blank','title'=>$this->lang->line('items_generate_barcodes'))); ?></span></li>
									<li class="float_right">
										<img src='<?php echo base_url()?>images/spinner_small.gif' alt='spinner' id='spinner' />
										<input type="text" name ='search' id='search'/>
										<input type="hidden" name ='limit_from' id='limit_from'/>
									</li>
								</ul>
							</div>

							<?php echo form_close(); ?>

							<div id="table_holder">
								<?php echo $manage_table; ?>
							</div>

							<div id="feedback_bar"></div>

						</div><!-- /.box-body -->
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view("partial/footer"); ?>
