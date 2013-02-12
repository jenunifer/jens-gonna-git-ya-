{extends file="Master.tpl"}

{block name=title}DBA METADB | HostMysqlAttributes{/block}

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
	.script("scripts/app/hostmysqlattributes.js").wait(function(){
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
		<i class="icon-th-list"></i> Host Mysql Attributes
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="hostmysqlattributes"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="hostMysqlAttributeCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_HostId">Host Id<% if (page.orderBy == 'HostId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MysqlAttributeId">Mysql Attribute Id<% if (page.orderBy == 'MysqlAttributeId') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Value">Value<% if (page.orderBy == 'Value') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UpdatedAt">Updated At<% if (page.orderBy == 'UpdatedAt') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('hostId')) %>">
				<td><%= _.escape(item.get('hostId') || '') %></td>
				<td><%= _.escape(item.get('mysqlAttributeId') || '') %></td>
				<td><%= _.escape(item.get('value') || '') %></td>
				<td><%if (item.get('updatedAt')) { %><%= _date(app.parseDate(item.get('updatedAt'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="hostMysqlAttributeModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="hostIdInputContainer" class="control-group">
					<label class="control-label" for="hostId">Host Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hostId" placeholder="Host Id" value="<%= _.escape(item.get('hostId') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlAttributeIdInputContainer" class="control-group">
					<label class="control-label" for="mysqlAttributeId">Mysql Attribute Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mysqlAttributeId" placeholder="Mysql Attribute Id" value="<%= _.escape(item.get('mysqlAttributeId') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valueInputContainer" class="control-group">
					<label class="control-label" for="value">Value</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="value" placeholder="Value" value="<%= _.escape(item.get('value') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="updatedAtInputContainer" class="control-group">
					<label class="control-label" for="updatedAt">Updated At</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="updatedAt" type="text" value="<%= _date(app.parseDate(item.get('updatedAt'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<div class="input-append bootstrap-timepicker-component">
							<input id="updatedAt-time" type="text" class="timepicker-default input-small" value="<%= _date(app.parseDate(item.get('updatedAt'))).format('h:mm A') %>" />
							<span class="add-on"><i class="icon-time"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteHostMysqlAttributeButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteHostMysqlAttributeButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete HostMysqlAttribute</button>
						<span id="confirmDeleteHostMysqlAttributeContainer" class="hide">
							<button id="cancelDeleteHostMysqlAttributeButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteHostMysqlAttributeButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="hostMysqlAttributeDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit HostMysqlAttribute
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="hostMysqlAttributeModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveHostMysqlAttributeButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="hostMysqlAttributeCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newHostMysqlAttributeButton" class="btn btn-primary">Add HostMysqlAttribute</button>
	</p>

{/block}
