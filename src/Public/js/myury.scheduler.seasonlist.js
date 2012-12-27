$('.twig-datatable').dataTable({
  "aoColumns": [
  //title
  {
    "sTitle": "Title",
    "sClass": "left"
  },
  //credits
  {
    "sTitle": "Credits"
  },
  //description
  {
    "sTitle" : "",
    "bVisible": false
  },
  //seasons
  {
    "sTitle": "Seasons",
    "bVisible": false
  },
  //editlink
  {
    "sTitle": "Edit",
    "bVisible": false
  },
  //applylink
  {
    "sTitle": "New Season",
    "bVisible": false
  },
  //micrositelink
  {
    "sTitle": "View Microsite",
    "bVisible": false
  },
  //id
  {
    "bVisible": false
  },
  //season_num
  {
    "sTitle": "Season #"
  },
  //createddate
  {
    "sTitle": "Submitted",
    "bVisible": false
  },
  //requestedtime
  {
    "sTitle": "Requested Time",
    "bVisible": false
  },
  //allocatelink
  {
    "sTitle": "Allocate",
    "bSortable": false,
    "bVisible": false
  },
  //rejectlink
  {
    "sTitle": "Reject",
    "bSortable": false,
    "bVisible": false
  }
  ],
  "bJQueryUI": true,
  "bPaginate": false
}
);