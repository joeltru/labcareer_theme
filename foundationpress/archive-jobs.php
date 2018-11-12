

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.8.0/dist/instantsearch.min.css">
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.8.0"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.8.0/dist/instantsearch-theme-algolia.min.css">
<style>
body .featured-hero {
    height: 23rem !important;
    opacity: 1;
    background-color: #d81e5b;
    border-bottom-left-radius:  15% 35%;
    -webkit-border-bottom-left-radius: 15% 35%;
    -moz-border-bottom-left-radius:  15% 35%;
    position: relative;
    background-size: 100%!important;
    background-position: 47% 19%!important;
}
aside#ais-facets {
    /* border-left: 1px solid silver; */
}

.cell.small-4.medium-3 {
    border-right: 1px solid #d2d2d2;
    padding-right: 20px;
}
</style>

<?php get_header(); ?>
<header class="featured-hero" role="banner" style="background:url();background-color:gray;">
     
        <div class="main-container">
            <div class="title_container">
              <h1 class="entry-title">Seach and Apply</h1>
            </div>
        </div>
   
	</header>



<div class="main-container">
	<div class="main-grid">
	<div id="ais-wrapper">
		<main id="ais-main">
            <div class="grid-x grid-margin-x">

            </div>





 <div class="grid-x grid-margin-x">

                <div class="cell small-4 medium-3">
                    <div id="jobs_facet_container">



            <aside id="ais-facets">
              <section class="ais-facets">
 
                    <div id="algolia-search-box">

                        <svg class="search-icon" width="25" height="25" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M24.828 31.657a16.76 16.76 0 0 1-7.992 2.015C7.538 33.672 0 26.134 0 16.836 0 7.538 7.538 0 16.836 0c9.298 0 16.836 7.538 16.836 16.836 0 3.22-.905 6.23-2.475 8.79.288.18.56.395.81.645l5.985 5.986A4.54 4.54 0 0 1 38 38.673a4.535 4.535 0 0 1-6.417-.007l-5.986-5.986a4.545 4.545 0 0 1-.77-1.023zm-7.992-4.046c5.95 0 10.775-4.823 10.775-10.774 0-5.95-4.823-10.775-10.774-10.775-5.95 0-10.775 4.825-10.775 10.776 0 5.95 4.825 10.775 10.776 10.775z" fill-rule="evenodd"></path></svg>

                    </div>
                      <div id="clear-all">
                            </div>

              </section>
                   <section class="ais-facets" id="facet-location"></section>
                <section class="ais-facets" id="facet-position"></section>
                    <section class="ais-facets" id="facet-categories"></section>
                    <section class="ais-facets" id="job_type"></section>
                <section class="ais-facets" id="facet-states"></section>


                <section class="ais-facets" id="facet-users"></section>
            </aside>
        </div>
    </div>
            <div class="cell small-8 medium-9">
                <div class="cell">

                    <div class="cell small-8 medium-8">
                        <div id="current-refined-values"></div>
                         <div style="display:none;" id="clear-all"></div>
                    </div>
                    <div class="cell small-4 medium-4">
                     <div id="algolia-stats"></div>
                 </div>
                </div>
			<div id="algolia-hits"></div>
			<div id="algolia-pagination"></div>
        </div>
        </div>
    </div>


		</main>
    </div>
    </div>
</div>



	<script type="text/html" id="tmpl-instantsearch-hit">
		<article itemtype="http://schema.org/Article">


			<div class="ais-hits--content">
   
				<h2 itemprop="name headline"><a href="{{ data.permalink }}" title="{{ data.post_title }}" itemprop="url">{{{ data._highlightResult.post_title.value }}}</a></h2>
        <ul class="listOfValues">
        <li><span class="optionName">Job ID# </span><span class="jobIDInfo">{{data.job_id}}</span></li>
        <li><span class="optionName">Job Type: </span><span class="jobSetting">{{data.job_type}}</span></li>
        <li><span class="optionName">Location: </span>{{data.macro_address}}</li>
        <!-- <li><span class="optionName">Shift: </span></li>
        <li><span class="optionName">Duration: </span></li> -->
        </ul>
				<div class="excerpt">
					<p></p>
			<# if ( data._snippetResult['content'] ) { #>
			  <span class="suggestion-post-content">{{{ data._snippetResult['content'].value }}}</span>
			<# } #>
					</p>
                    <div class="grid-x grid-margin-x">


                            <div class="cell small-4">
                              <a href="{{ data.permalink }}" class="applyNowBtn button btn">
                               Learn More & Apply 
                              </a>
                            </div>




                    </div>
				</div>
			</div>
			<div class="ais-clearfix"></div>
		</article>
	</script>


	<script type="text/javascript">
		jQuery(function() {
			if(jQuery('#algolia-search-box').length > 0) {

				if (algolia.indices.searchable_posts === undefined && jQuery('.admin-bar').length > 0) {
					alert('It looks like you haven\'t indexed the searchable posts index. Please head to the Indexing page of the Algolia Search plugin and index it.');
				}



				/* Instantiate instantsearch.js */
				var search = instantsearch({
					appId: algolia.application_id,
					apiKey: algolia.search_api_key,
					indexName: algolia.indices.searchable_posts.name,
				  routing: true,
					searchParameters: {
						facetingAfterDistinct: true,
			highlightPreTag: '__ais-highlight__',
			highlightPostTag: '__/ais-highlight__'
					}
				});

				/* Search box widget */
				search.addWidget(
					instantsearch.widgets.searchBox({
						container: '#algolia-search-box',
						placeholder: 'Search',
						wrapInput: false,
						poweredBy: algolia.powered_by_enabled
					})
				);
        
				/* Stats widget */
				search.addWidget(
					instantsearch.widgets.stats({
						container: '#algolia-stats'
					})
				);

				/* Hits widget */
				search.addWidget(
					instantsearch.widgets.hits({
						container: '#algolia-hits',
						hitsPerPage: 10,
						templates: {
							empty: 'No results were found for "<strong>{{query}}</strong>".',
							item: wp.template('instantsearch-hit')
						},
						transformData: {
							item: function (hit) {

								function replace_highlights_recursive (item) {
								  if( item instanceof Object && item.hasOwnProperty('value')) {
									  item.value = _.escape(item.value);
									  item.value = item.value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
								  } else {
									  for (var key in item) {
										  item[key] = replace_highlights_recursive(item[key]);
									  }
								  }
								  return item;
								}

								hit._highlightResult = replace_highlights_recursive(hit._highlightResult);
								hit._snippetResult = replace_highlights_recursive(hit._snippetResult);

								return hit;
							}
						}
					})
				);

				/* Pagination widget */
				search.addWidget(
					instantsearch.widgets.pagination({
						container: '#algolia-pagination'
					})
				);

				/* Post types refinement widget */
				search.addWidget(
					instantsearch.widgets.menu({
						container: '#facet-states',
						attributeName: 'state',
						sortBy: ['isRefined:desc', 'name:asc'],
						limit: 10,
						templates: {
							header: '<h3 class="widgettitle">State<i class="fa fa-chevron-down" aria-hidden="true"></i></h3>'
						},
					})
				);
        	search.addWidget(
					instantsearch.widgets.menu({
						container: '#facet-categories',
						attributeName: 'category.name',
						sortBy: ['isRefined:desc', 'count:desc', 'name:asc'],
						limit: 50,
						templates: {
							header: '<h3 class="widgettitle">Category<i class="fa fa-chevron-down" aria-hidden="true"></i></h3>'
						},
					})
				);
                search.addWidget(
					instantsearch.widgets.menuSelect({
						container: '#facet-location',
						attributeName: 'macro_address',
						sortBy: ['isRefined:desc',  'name:asc'],
						limit: 10,
						templates: {
							header: '<h3 class="widgettitle">Location</h3>'
						},
					})
				);
                search.addWidget(
                   instantsearch.widgets.refinementList({
                       container: '#job_type',
                       attributeName: 'job_type',
                       sortBy: ['isRefined:desc'],
                       limit: 10,
                        collapsible:true,
                       templates: {
                           header: '<h3 class="widgettitle">Job Type<i class="fa fa-chevron-down" aria-hidden="true"></i></h3>'
                       },
                   })
               );
               
               search.addWidget(
                  instantsearch.widgets.clearAll({
                    container: '#clear-all',
                    templates: {
                      link: 'reset results'
                    },
                    autoHideContainer: true,
                    clearsQuery: true,
                  })
                );
                search.addWidget(
                  instantsearch.widgets.currentRefinedValues({
                    container: '#current-refined-values',
                    clearAll: 'after',
                    clearsQuery: true,
                    attributes: [
                      {name: 'location', label: 'Location'},
                      {name: 'position', label: 'Position'},


                    ],
                    onlyListedAttributes: true,
                  })
);





				/* Start */ 
				search.start();

function onRenderHandler() {
jQuery(".widgettitle i").on("click" , function(e){
  jQuery(this).closest('.ais-facets').find('.ais-body.ais-menu--body').toggle();
  
})
      jQuery("span.suggestion-post-content").each(function(){
      var text = jQuery(this).text();
      jQuery(text).replace("Description:" , "");
})
}

search.on('render', onRenderHandler);

		
			}
      
		});
	</script>

<?php get_footer(); ?>
