{extends file="Master.tpl"}

{block name=title}DBA METADB | VipServers{/block}

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
	.script("scripts/app/vipservers.js").wait(function(){
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
		<i class="icon-th-list"></i> VipServers
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="vipservers"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="vipServerCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_VipId">Vip Id<% if (page.orderBy == 'VipId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ServerId">Server Id<% if (page.orderBy == 'ServerId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('vipId')) %>">
				<td><%= _.escape(item.get('vipId') || '') %></td>
				<td><%= _.escape(item.get('serverId') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="vipServerModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="vipIdInputContainer" class="control-group">
					<label class="control-label" for="vipId">Vip Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="vipId" placeholder="Vip Id" value="<%= _.escape(item.get('vipId') || '') %>" />
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
		<form id="deleteVipServerButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteVipServerButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete VipServer</button>
						<span id="confirmDeleteVipServerContainer" class="hide">
							<button id="cancelDeleteVipServerButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteVipServerButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="vipServerDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit VipServer
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="vipServerModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveVipServerButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="vipServerCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newVipServerButton" class="btn btn-primary">Add VipServer</button>
	</p>

{/block}
