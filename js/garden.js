/**
 *
 * Core Urban Garden Manager Front End
 *
 *
 * @author Justin Burger <j@justinburger.com>
 *
 */

/**
 * Bed Prototype Class.
 *  Garden -> Bed -> SQFT -> SQFT_Item
 *
 *
 * @author Justin Burger <justin@loudisrelative.com>
 * @package Javascript_Class
 */
var Bed = Class.create({
  initialize: function() {
    this.id = null;
    this.name = '';
    this.ts = '';
    this.garden_id = '';
    this.top = '';
    this.left = '';
    this.height = '';
    this.width = '';
    this.sqft = new Array();

  },

  setName: function(name){
    this.name = name;
  },

  toggleMovable: function(){},

  renderXHTML: function(){},

  getXHTML: function(){},

  addSQFTItem: function(){
       this.bed = $('bed').value;
       this.sqft = $('sqft_id').value;
      var parms = '&sqft='+this.sqft+'&bed_id='+this.bed+'&veggie='+$('veggie').value+'&percent='+$('percent').value + '&quantity=' + $('quantity').value + '&frmdate=' + $('from_date').value+ '&todate=' + $('to_date').value;
      
       var mb = Modalbox.show('/sqft/additem/'+this.bed+'/'+this.sqft, {method:'post',params:parms, title: "Square Foot Details", width: 700, afterHide: function() { gbl.gardenObject.handleSQFTOnHide(this.bed,this.sqft); }.bind(this)}); return false;
  }
});

/* -------------------------------------------------------------------------------- */

/**
 * Garden Prototype Class.
 *
 *  Garden -> Bed -> SQFT -> SQFT_Item
 *
 * @author Justin Burger <justin@loudisrelative.com>
 * @package Javascript_Class
 */
var Garden = Class.create({
  initialize: function(mode) {
    this.id = null;
    this.name = '';
    this.description = '';
    this.user_id = null;
    this.ts = null;
    this.mode = mode; /* assignments,plant_types,date */
    this.beds = null;
    this.sqft_items = Array();

  },

  loadFromJSON: function(json){
   this.id = json.id;
    this.name = json.name;
    this.description = json.description;
    this.user_id = json.user_id;
    this.ts = json.ts;
  },

 loadBedsFromJSON: function(json){
     this.beds = new Array();
     for(i=0; i<json.length; i++){
         bed = json[i];
         var tmpGardenBed = new Bed();
         tmpGardenBed.garden_id = bed.garden_id;
         tmpGardenBed.name = bed.name;
         tmpGardenBed.height = bed.height;
         tmpGardenBed.width = bed.width;
         tmpGardenBed.top = bed.top;
         tmpGardenBed.left = bed.left;
         tmpGardenBed.id = bed.id;
         tmpGardenBed.ts = bed.ts;
         this.beds[this.beds.size()] = tmpGardenBed;
     }

 },

    loadSQFTFromJSON: function(json){
      this.sqft_items = json;
        return true;
    },

 handleLoadResponse: function(transport, json){
    this.name = json.name;
    this.description = json.description;
    this.user_id = json.user_id;
    this.ts = json.ts;
  },

    /**
     * Render XHTML.
     */
  renderXHTML: function(){
      $('gardenLabel').update(this.name);
       $('garden-container').update(this.getLegendXHTML());
      /*Constructing the beds.*/
      for(i=0; i<this.beds.size(); i++){
          var table = new Element('table');
          var tr = new Element('tr');
          var sqft_item_count = this.beds[i].height * this.beds[i].width;
          for(x=0; x<sqft_item_count; x++){
            if ((x % this.beds[i].width) == 0){
                table.appendChild(tr);
                var tr = new Element('tr');
            }

              onclickFunctionStr = 'gbl.gardenObject.handleSQFTOnClick('+this.beds[i].id+','+x+');';
              sqftclass = this.getSQFTClassName(i,x);
              sqftid='sqft_'+i+'_'+x;
              var td = new Element('td', {id:sqftid, onclick:onclickFunctionStr}).update(x);
              td.addClassName(sqftclass);
              tr.appendChild(td);
          }

        table.appendChild(tr);
        var div = new Element('div', {'class': 'gardenBed'}).update(this.beds[i].name);
        var p = new Element('p').update('&nbsp;');
        div.appendChild(table);
        div.appendChild(p);
        $('garden-container').hide();
        $('garden-container').appendChild(div);
        $('garden-container').appear();

      }

  },


    /**
     * Get SQFT Class Name.
     * Based on the current mode, we determine which class name should be used
     * which will change the color of the sqft.
     *
     * @author Justin Burger <j@justinburger.com>
     * @param bed Array Item # of this.bed
     * @param sqft_item Array #, and database item number of this.sqft_items
     *
     * @return String CSS Classname.
     * 
     *
     * @todo finish all view modes.
     *
     *
     */
    getSQFTClassName: function(bed, sqft_item){
        switch(this.mode){
            case 'assignments':
                    sqft_size = this.sqft_items.size();

                    for(h=0; h<sqft_size; h++){
                        if(this.sqft_items[h].garden_bed_id == this.beds[bed].id && sqft_item == this.sqft_items[h].item){
                            if(this.sqft_items[h].total_percent >=100){
                                return 'sqft_100used';
                            }else{
                                return 'sqft_100someAssigned';
                            }

                        }
                    }

                    return 'sqft_rb';

            break;

            case 'plant_type':
                      sqft_size = this.sqft_items.size();

                    for(h=0; h<sqft_size; h++){
                        if(this.sqft_items[h].garden_bed_id == this.beds[bed].id && sqft_item == this.sqft_items[h].item){
                            if(this.sqft_items[h].total_percent >=100){
                                return 'sqft_100used';
                            }else{
                                return 'sqft_100someAssigned';
                            }

                        }
                    }
            break;

            case 'date':
            break;

            case 'alerts':
            break;

            case 'temps':
            break;

            default:
            return 'sqft_rb';

        }
        return 'sqft_rb';
    },

  getLegendXHTML: function(){
      if(this.mode == 'assignments'){
          var div = new Element('div');
          var p = new Element('p');
          var table = new Element('table');
           table.addClassName('legend_table');
          var tr = new Element('tr');
          var td = new Element('td').update('&nbsp;');
           td.addClassName('sqft_rb');
           tr.appendChild(td);

           td = new Element('td').update('&nbsp;Nothing Assigned&nbsp;&nbsp;');
           tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_100used');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;100% Assigned&nbsp;&nbsp;');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_100someAssigned');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;Partially Assigned&nbsp;&nbsp;');
          tr.appendChild(td);
          table.appendChild(tr);
          p.update('&nbsp;');
          div.appendChild(table);
          div.appendChild(p);

          return div;
      }else if(this.mode == 'date'){
          var table = new Element('table');
          table.addClassName('legend_table');
          var tr = new Element('tr');
          var td = new Element('td').update('&nbsp;');
           td.addClassName('sqft_rb');
           tr.appendChild(td);

           td = new Element('td').update('&nbsp;Nothing Assigned&nbsp;&nbsp;');
           tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_30days');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;Harvest in 30 days &nbsp;&nbsp;');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_60days');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;Harvest in 60 days &nbsp;&nbsp;');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_90days');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;Harvest in 90 days &nbsp;&nbsp;');
          tr.appendChild(td);

          table.appendChild(tr);
          return table;
      }else if(this.mode == 'alerts'){
          var table = new Element('table');
           table.addClassName('legend_table');
          var tr = new Element('tr');
          var td = new Element('td').update('&nbsp;');
           td.addClassName('sqft_rb');
           tr.appendChild(td);

           td = new Element('td').update('&nbsp;Nothing Assigned&nbsp;&nbsp;');
           tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_alert');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;Alerts &nbsp;&nbsp;');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_warning');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;Upcomming Alerts &nbsp;&nbsp;');
          tr.appendChild(td);


          table.appendChild(tr);
          return table;
      }else if(this.mode == 'temps'){
          var table = new Element('table');
           table.addClassName('legend_table');
          var tr = new Element('tr');
          var td = new Element('td').update('&nbsp;');
           td.addClassName('sqft_rb');
           tr.appendChild(td);

           td = new Element('td').update('&nbsp;Nothing Assigned&nbsp;&nbsp;');
           tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_freeze');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;0&deg; - 31&deg; &nbsp;&nbsp;');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_cold');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp; 32&deg; - 50&deg;&nbsp;&nbsp;');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_med');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp; 51&deg; - 70&deg;&nbsp;&nbsp;');
          tr.appendChild(td);

           td = new Element('td').update('&nbsp;');
          td.addClassName('sqft_hot');
          tr.appendChild(td);

          td = new Element('td').update('&nbsp; 71&deg;+&nbsp;&nbsp;');
          tr.appendChild(td);


          table.appendChild(tr);
          return table;
      }
  },

   handleSQFTOnClick: function(bed, sqft){
       var bed_div_id = null;
       for(i=0; i<this.beds.length; i++){
           if(this.beds[i].id == bed){
               bed_div_id = i;
           }
       }

       $('sqft_'+bed_div_id+'_'+sqft).removeClassName('sqft_rb');
       $('sqft_'+bed_div_id+'_'+sqft).addClassName('sqft_rb_selected');
       this.bed = bed_div_id;
       this.sqft = sqft;
       var mb = Modalbox.show('/sqft/view/'+this.beds[bed_div_id].id+'/'+sqft, {title: "Square Foot Details", width: 700, afterHide: function() { gbl.gardenObject.handleSQFTOnHide(this.bed,this.sqft); }.bind(this)}); return false;
   },

    handleSQFTOnHide: function(bed, sqft){

        $('sqft_'+bed+'_'+sqft).removeClassName('sqft_rb_selected');
        $('sqft_'+bed+'_'+sqft).addClassName('sqft_rb');
        this.bed = null;
       this.sqft = null;
    },

    handleViewTypeChange: function(mode){
        gbl.gardenObject.mode = mode;
        gbl.gardenObject.renderXHTML();
       

        

    },

  getXHTML: function(){}
});

/* -------------------------------------------------------------------------------- */

/**
 * SQFT Prototype Class.
 *  Garden -> Bed -> SQFT -> SQFT_Item
 *
 *
 * @author Justin Burger <justin@loudisrelative.com>
 * @package Javascript_Class
 */
var SQFT = Class.create({
  initialize: function() {
    this.bed_id = null;
    this.SQFT_Items = null;

  },

  load: function(id){
      /* AJAX HERE to load via JSON headers ;-) */
  },

  setName: function(name){
    this.name = name;
  },

  toggleMovable: function(){},

  renderXHTML: function(){},

  getXHTML: function(){}
});

/* -------------------------------------------------------------------------------- */


/**
 * Garden Boot Loader Prototype Class.
 * A simple boot loader class which accepts a garden_id, and
 * creates a garden object containing all of the data and subclasses.
 * 
 *  Garden -> Bed -> SQFT -> SQFT_Item
 *
 *
 * @author Justin Burger <justin@loudisrelative.com>
 * @package Javascript_Class
 */
var GardenBootLoader = Class.create({
  initialize: function(garden_id,mode) {
    this.garden_id = garden_id;
    this.gardenObject = null;
    this.mode = mode;
    this._construct(garden_id);
  },

    /**
     * Uses a simple AJAX call to request a JSON object containing
     * all the garden->bed->sq_feet_item data to recontruct the object.
     *
     * @param garden_id
     */
  _construct: function(garden_id){
      new Ajax.Request('/garden/getGardenJSONConstructor/' + garden_id,
      {
          method:'post',
          postBody: '&date='+$('date').value,
          onSuccess: function(transport, json) {
              this.handleLoadResponse(transport, json);
          }.bind(this),
          onFailure: function() {
              alert('Something went wrong...')
          }
      });
  },

    /**
     * Handle Load Response
     * Accepts an AJAX response via onSuccess and loads the
     * JSON data into the respective objects to completely construct
     * a garden->bed->sq_feet_items object relationships.
     *
     * @param transport AJAX transport response.
     * @param json AJAX JSON Header response.
     */
  handleLoadResponse: function(transport, json){
    this.gardenObject = new Garden(this.mode);
    this.gardenObject.loadBedsFromJSON(json.beds);

    this.gardenObject.loadFromJSON(json.garden);
    this.gardenObject.loadSQFTFromJSON(json.sqftitems);
   }});

