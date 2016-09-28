function callListDocuments(id,collectionName,userId){
                if(id=='dashboard'){
                        var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/clustering', { user: userId,limit: 3 } );
                        posting.done(function( data ) {
                                $('#dashboard-clustering').html(data);
                                $('body').removeClass("loading");
                        });
                        posting.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                        var posting2 = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/listDocuments', { user: userId, limit: 5 } );
                        posting2.done(function( data ) {
                                prepareDocsView( data );
                                $('body').removeClass("loading");
                        });
                        posting2.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                        var posting3 = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/geolocalization', { user: userId, limit: 5 } );
                        posting3.done(function( data ) {
                                $('#dashboard-map').html(data.replace("400px","800px"));
                                $('body').removeClass("loading");
                        });
                        posting3.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
                        var posting4 = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/timelining', { user: userId, limit: 5 } );
                        posting4.done(function( data ) {
                                $('#dashboard-timeline').html(data.replace("400px","800px"));
                                $('body').removeClass("loading");
                        });
                        posting4.fail(function(xhr,status,error){
                                alert(status);
                                $('body').removeClass("loading");
                        });
/*                        var posting5 = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/semanticexploration', { user: userId, limit: 3 } );
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
                	var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/clustering', { user: userId } );
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
                	var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/listDocuments', { user: userId } );
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
                	var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/geolocalization', { user: userId } );
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
                	var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/timelining', { user: userId } );
                	posting.done(function( data ) {
				alert(data);
                                $('#main-content-content').html(data.replace("400px","800px")); 
		                $('body').removeClass("loading");
                	});
                	posting.fail(function(xhr,status,error){
                	        alert(status);
		                $('body').removeClass("loading");
                	});
                }
                else if(id=='semanticexploration'){
/*                	var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/semanticexploration', { user: userId } );
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
}

function callDocumentDetails(id,collectionName,userId,documentId){
                if(id=='documentHighContent'){
                        var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/clustering', { user: userId } );
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
                        var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/listDocuments', { user: userId } );
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
