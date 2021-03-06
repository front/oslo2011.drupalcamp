// $Id$
// perceptivity.eu  websitecrew.com

/**
 * @file equalize-blocks.js
 * Apply equal height to blocks in selected regions.
 */

$(document).ready(function() {
  var tags_hash = new Array();
  tmp=Drupal.settings.active_regions+'';
  if(tmp.indexOf(',')<1) {
    tags_hash[0]=tmp;    
  } else {
    tags_hash=tmp.split(",");
  }
  applyHeights(tags_hash);
});

function applyHeights(tags_hash) {
  var tmpTag = "";
  var toLoop = tags_hash.length
  for (tmpi=0; tmpi<toLoop; tmpi++) {
    xclass=$('#'+tags_hash[tmpi]+' .block-content').attr('class');
    $('#'+tags_hash[tmpi]+' .block-content').attr('class',xclass+' clearfix');
    $('#'+tags_hash[tmpi]+' .block-content').equalHeight();
  }
}
