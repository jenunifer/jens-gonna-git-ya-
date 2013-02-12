{extends file="Master.tpl"}

{block name=title}DBA METADB | CnameServers{/block}

{block name=customHeader}
<script type="text/javascript">
	$LAB.script("bootstrap/js/bootstrap-datepicker.js")
	.script("bootstrap/js/bootstrap-timepicker.js")
	.script("bootstrap/js/bootstrap-combobox.js")
	.script("scripts/libs/underscore-min.js").wait()
	.script("scripts/libs/underscore.date.min.js")
	.script("scripts/libs/backbone-min.js")
	.script("scripts/app.js")
	.script("scripts/model.js").wait()
	.script("scripts/view.js").wait()
	.script("scripts/app/cnameservers.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});

		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>
{/block}

{block name=banner}
	<h1>
		<i class="icon-th-list"></i> CnameServers
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="cnameservers"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="cnameServerCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_CnameId">Cname Id<% if (page.orderBy == 'CnameId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ServerId">Server Id<% if (page.orderBy == 'ServerId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('cnameId')) %>">
				<td><%= _.escape(item.get('cnameId') || '') %></td>
				<td><%= _.escape(item.get('serverId') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="cnameServerModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="cnameIdInputContainer" class="control-group">
					<label class="control-label" for="cnameId">Cname Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cnameId" placeholder="Cname Id" value="<%= _.escape(item.get('cnameId') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="serverIdInputContainer" class="control-group">
					<label class="control-label" for="serverId">Server Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="serverId" placeholder="Server Id" value="<%= _.escape(item.get('serverId') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCnameServerButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCnameServerButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete CnameServer</button>
						<span id="confirmDeleteCnameServerContainer" class="hide">
							<button id="cancelDeleteCnameServerButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCnameServerButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="cnameServerDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit CnameServer
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="cnameServerModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCnameServerButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="cnameServerCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCnameServerButton" class="btn btn-primary">Add CnameServer</button>
	</p>

{/block}
