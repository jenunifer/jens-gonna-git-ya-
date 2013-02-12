{extends file="Master.tpl"}

{block name=title}DBA METADB | Cnames{/block}

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
	.script("scripts/app/cnames.js").wait(function(){
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
		<i class="icon-th-list"></i> Cnames
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="cnames"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="cnameCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fqdn">Fqdn<% if (page.orderBy == 'Fqdn') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_HostId">Host Id<% if (page.orderBy == 'HostId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_VipHostId">Vip Host Id<% if (page.orderBy == 'VipHostId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('fqdn') || '') %></td>
				<td><%= _.escape(item.get('hostId') || '') %></td>
				<td><%= _.escape(item.get('vipHostId') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="cnameModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fqdnInputContainer" class="control-group">
					<label class="control-label" for="fqdn">Fqdn</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fqdn" placeholder="Fqdn" value="<%= _.escape(item.get('fqdn') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hostIdInputContainer" class="control-group">
					<label class="control-label" for="hostId">Host Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hostId" placeholder="Host Id" value="<%= _.escape(item.get('hostId') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="vipHostIdInputContainer" class="control-group">
					<label class="control-label" for="vipHostId">Vip Host Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="vipHostId" placeholder="Vip Host Id" value="<%= _.escape(item.get('vipHostId') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCnameButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCnameButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Cname</button>
						<span id="confirmDeleteCnameContainer" class="hide">
							<button id="cancelDeleteCnameButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCnameButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="cnameDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Cname
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="cnameModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCnameButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="cnameCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCnameButton" class="btn btn-primary">Add Cname</button>
	</p>

{/block}
