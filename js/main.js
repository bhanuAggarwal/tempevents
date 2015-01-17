function getEventList() {
	$.ajax({
		type:'GET',
		url:'../events/php/getEventList.php',
		success: function(eventObject) {
					//console.log(eventObject);
					var key = 0;
					eventList = JSON.parse(eventObject,function(id,name) {
						//console.log(name);
						if(key == 0) {
							$('#eventList').append(	
								'<li id="event'+id+'">'+
									'<figure>'+
										'<img src="conf_menu/images/4.jpg" alt="img01"/>'+
										'<figcaption><h3>'+name+'</h3></figcaption>'+
									'</figure>'+
								'</li>'
							//'<button type="button" class="btn btn-default margin10 col-md-2 col-sm-3 col-xs-10 " data-toggle="modal" data-target="#myModal" onClick="eventDetail('+id+')" id="event'+id+'" >'+name+'</button>'
							);
							$('#slideshow').append(
								'<li>'+
									'<figure>'+
										'<figcaption>'+
											'<h3 align="center">'+name+'</h3>'+
										'</figcaption>'+
										'<iframe src="conf_menu/index.html" width="100%" height="140%" style="border:#fff solid 10px;position:relative;top:10%"></iframe>'+
									'</figure>'+
								'</li>'
							);
							key = 1;
						}
						else{
							key = 0;
						}
					});
					$('#event').remove();
					
				}
	
	});

}

getEventList();