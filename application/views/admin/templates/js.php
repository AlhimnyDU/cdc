  <script src="<?php echo base_url() ?>assets/admin/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/admin/lib/advanced-datatable/js/jquery.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url() ?>assets/admin/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/admin/lib/sparkline-chart.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/lib/zabuto_calendar.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>assets/admin/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url() ?>assets/admin/lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";
      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      $('.datatable').dataTable();
    });
  </script>