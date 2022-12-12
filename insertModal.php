<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                <h4 class="modal-title">User Detail</h4>
</div>
<div class="modal-body" >
    <form method="post" id="insert-form">
        <label>Name</lable>
        <input type="hidden" id='id' name='id' />
        
        <input type="text" id='fname'  name="fname"  class="form-control" />
        <input type="submit" id='insert' class="btn btn-sucess" />
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
<?php //ต้องมี id -addModal  form id="insert-form" ?>