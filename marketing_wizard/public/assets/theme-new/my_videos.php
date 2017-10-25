<div class="ibox-title">
    <h2>
        My Videos
    </h2>
</div>
<div class="ibox-content">
  <div class = "row" >
    <div class = "col-lg-12" >
      <h3>PENDING VIDEOS</h3>
      <input type="text" class="form-control input-sm m-b-xs" id="filter-pending" placeholder="Search in table">
      <table class="footable_pending-videos table table-stripped table-data-primary" data-page-size="8" data-filter=#filter-pending>
        <thead>
          <tr>
            <th>TITLE</th>
            <th>CREATED</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td>Rendering</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td>Rendering</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td>Rendering</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td>Rendering</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td>Rendering</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class = "col-lg-12" >
      <h3>COMPLETED VIDEOS</h3>
      <input type="text" class="form-control input-sm m-b-xs" id="filter-pending" placeholder="Search in table">
      <table class="footable_pending-videos table table-stripped table-data-primary" data-page-size="8" data-filter=#filter-pending>
        <thead>
          <tr>
            <th>TITLE</th>
            <th>CREATED</th>
            <th>URL</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td><a href = '#'>http://www.youtube.com?v=DKD*EL8dfes</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td><a href = '#'>http://www.youtube.com?v=DKD*EL8dfes</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td><a href = '#'>http://www.youtube.com?v=DKD*EL8dfes</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td>Rendering</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
          <tr class="gradeX">
            <td>Cool Video No #1</td>
            <td>21/10/2016</td>
            <td><a href = '#'>http://www.youtube.com?v=DKD*EL8dfes</td>
            <td class="center"><button class = "btn btn-primary btn-sm"><i class = "fa fa-remove"></i> Delete</button></td>
          </tr>
        </tbody>
      </table>
    </div> 
  </div>
</div><!--ibox-content-->

<script>
    $(document).ready(function() {
      // Footable
      $('.footable_pending-videos').footable();
      $('.footable_completed-videos').footable();

    });
</script>
