function callListDocuments(id,collectionName,userId){
		userId = 'dkt-project@dfki.de';
                if(id=='dashboard'){
                        var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/clustering', { user: userId,limit: 3 } );
                        posting.done(function( data ) {
                                $('#dashboard-clustering').html(data);
                                $('body').removeClass("loading");
                        });
                        posting.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                        /*var posting2 = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/listDocuments', { user: userId, limit: 5 } );
                        posting2.done(function( data ) {
                                prepareDocsView( data );
                                $('body').removeClass("loading");
                        });
                        posting2.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });*/
                        var posting3 = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/geolocalization', { user: userId, limit: 5 } );
                        posting3.done(function( data ) {
                                $('#dashboard-map').html(data.replace("400px","800px"));
                                $('body').removeClass("loading");
                        });
                        posting3.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                        var posting4 = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/timelining', { user: userId, limit: 5 } );
                        posting4.done(function( data ) {
                                //$('#dashboard-timeline').html(data.replace("400px","800px"));
			        var timeline_json = JSON.parse(data);//make_the_json(); // you write this part
			        window.timeline = new TL.Timeline('timeline-embed', timeline_json);
                                $('body').removeClass("loading");
                        });
                        posting4.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
/*                        var posting5 = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/semanticexploration', { user: userId, limit: 3 } );
                        posting5.done(function( data ) {
                                $('#dashboard-semanticexploration').html(data.replace("400px","800px"));
                                $('body').removeClass("loading");
                        });
                        posting5.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });*/
                }
                else if(id=='clustering'){
                	var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/clustering', { user: userId } );
                	posting.done(function( data ) {
                                $('#main-content-content').html(data.replace("400px","800px")); 
		                $('body').removeClass("loading");
                	});
                	posting.fail(function(xhr,status,error){
                	        alert(status);
		                $('body').removeClass("loading");
                	});
                }
                else if(id=='documents'){
			//alert('http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/listDocuments::::'+userId);
                	var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/listDocuments', { user: userId } );
                	posting.done(function( data ) {
				prepareDocsView( data );
		                $('body').removeClass("loading");
                	});
                	posting.fail(function(xhr,status,error){
                	        alert(status);
		                $('body').removeClass("loading");
                	});
                }
                else if(id=='map'){
                	var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/geolocalization', { user: userId } );
                	posting.done(function( data ) {
                                $('#main-content-content').html(data.replace("400px","800px")); 
		                $('body').removeClass("loading");
                	});
                	posting.fail(function(xhr,status,error){
                	        alert(status);
		                $('body').removeClass("loading");
                	});
                }
                else if(id=='timeline'){
                	var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/timelining', { user: userId } );
                	posting.done(function( data ) {
				//alert(data);
			        var timeline_json = JSON.parse(data);//make_the_json(); // you write this part
			        window.timeline = new TL.Timeline('timeline-embed', timeline_json);
                                //$('#main-content-content').html(data.replace("400px","800px")); 
		                $('body').removeClass("loading");
                	});
                	posting.fail(function(xhr,status,error){
                	        alert(status);
		                $('body').removeClass("loading");
                	});
                }
                else if(id=='semanticexploration'){
/*                	var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/semanticexploration', { user: userId } );
                	posting.done(function( data ) {
                                $('#main-content-content').html(data.replace("400px","800px")); 
		                $('body').removeClass("loading");
                	});
                	posting.fail(function(xhr,status,error){
                	        alert(status);
		                $('body').removeClass("loading");
                	});*/
		                $('body').removeClass("loading");
                }
                else if(id=='autoglossary'){
			var apiBase = "http://dev.digitale-kuratierung.de/api";
			$.get(apiBase + "/data-backend/"+collectionName+"/glossary", function(data){
				var html = "<p>";
				for( var firstChar in data ){
					html += '<a href="#ref-' + firstChar + '">' + firstChar.toUpperCase() + "</a> ";
				}
				html += "</p>";
				$('#glossary').prepend(html);
			
				for( var firstChar in data ){
					var html = "<h2 id=\"ref-" + firstChar + "\">" + firstChar.toUpperCase() + "</h2>\n<ul>\n";
					$('#glossary-container').append(html);
				
					for( var i=0; i<data[firstChar].length; i++){
						o = data[firstChar][i];
						var html = "<li><strong>" + o["word"] + "\n</strong><ul class=\"glossar\">";
						for( var j=0; j<o["references"].length; j++){
							html += "<li><a href=\"#\">" + o["references"][j] + "</a></li>\n";
						}
						html += "</ul></li>";
						$('#glossary-container').append(html);
					}
					$('#glossary-container').append("</ul>");
				}
			
				$('#glossary-container a').click(function(e){
					e.preventDefault();
					var res = $(this).html();
					$.get(apiBase + '/data-backend/'+collectionName+'/authorities/api/load-text?resource=' + encodeURIComponent(res), function(result){
						$('#selected-document h2').html(res);
						$('#selected-document span').html(result.replace(/\n/g, "<br>"));			
					});
				});	
			});


/*                      var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/semanticexploration', { user: userId } );
                        posting.done(function( data ) {
                                $('#main-content-content').html(data.replace("400px","800px")); 
                                $('body').removeClass("loading");
                        });
                        posting.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });*/
                                $('body').removeClass("loading");
                }
                else if(id=='stats'){
                        var apiBase = "http://dev.digitale-kuratierung.de/api";
                	$.get(apiBase + "/data-backend/"+collectionName+"/stats/entities", function(data){
                	        populateTopEntities(data["http://dbpedia.org/ontology/Person"], "#top-persons");
                	        populateTopEntities(data["http://dbpedia.org/ontology/Location"], "#top-locations");
                	        populateTopEntities(data["http://dbpedia.org/ontology/Organisation"], "#top-organisations");
                	        populateTopEntities(data["http://www.w3.org/2006/time#TemporalEntity"], "#top-temp");
                	});
	                $('#general-stats').html("");
        	        $.get(apiBase + "/data-backend/"+collectionName+"/stats/general", function(data){
                	        $('<li/>').html( "Number of triples: " + data.numberOfTriples ).appendTo($('#general-stats'));
        	                $('<li/>').html( "Number of contexts: " + data.numberOfContexts ).appendTo($('#general-stats'));
                                $('body').removeClass("loading");
	                });

		}
                else if(id=='authorities'){
                        var apiBase = "http://dev.digitale-kuratierung.de/api";
			alert('Llegamos');
                                $.get(apiBase + "/data-backend/"+collectionName+"/authorities/api/load-contexts", function(result) {
                                        data.documents = result;
                                        $('#documentsList').html("");
                                        for (var i = 0; i < result.length; i++) {
                                                var doc = result[i];
                                                var html = "<li><a href='#' index='" + i + "'>"
                                                                + doc.uri + '</a></li>\n';
                                                $("#documentsList").append(html);
                                        }

                                        $("#documentsList a").click(function(e) {
                                                e.preventDefault();
                                                // load document content
                                                var index = $(this).attr("index");
                                                var doc = data.documents[index];
			loadCollectionName(collectionName);
                                                loadDocument(doc.uri, doc.text);
                                        });
                                $('body').removeClass("loading");
                                });
		}
}

function callDocumentDetails(id,collectionName,userId,documentId){
                if(id=='documentHighContent'){
                        var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/clustering', { user: userId } );
                        posting.done(function( data ) {
                                $('#main-content-content').html(data.replace("400px","800px"));
                                $('body').removeClass("loading");
                        });
                        posting.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                }
                else if(id=='documentNifContent'){
                        var posting = $.get( 'http://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/listDocuments', { user: userId } );
                        posting.done(function( data ) {
                                prepareDocsView( data );
                                $('body').removeClass("loading");
                        });
                        posting.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                }
}
