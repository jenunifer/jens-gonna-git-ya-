{extends file="Master.tpl"}

{block name=title}DBA METADB | Servers{/block}

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
	.script("scripts/app/servers.js").wait(function(){
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
		<i class="icon-th-list"></i> Servers
		<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
		<span class='input-append pull-right searchContainer'>
			<input id='filter' type="text" placeholder="Search..." />
			<button class='btn add-on'><i class="icon-search"></i></button>
		</span>
	</h1>
{/block}

{block name=navbar prepend}
	{assign var="nav" value="servers"}
{/block}

{block name=content}

	<!-- underscore template for the collection -->
	<script type="text/template" id="serverCollectionTemplate">
		<table class="collection table table-bordered">
		<thead>
			<tr>
				<th id="header_Ipaddr">Ipaddr<% if (page.orderBy == 'Ipaddr') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MysqlDbCluster">Mysql Db Cluster<% if (page.orderBy == 'MysqlDbCluster') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MysqlDbClusterPart">Mysql Db Cluster Part<% if (page.orderBy == 'MysqlDbClusterPart') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Platform">Platform<% if (page.orderBy == 'Platform') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UnmonitoredUntil">Unmonitored Until<% if (page.orderBy == 'UnmonitoredUntil') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
{* UNCOMMENT TO SHOW ADDITIONAL COLUMNS *}
{*
				<th id="header_Role">Role<% if (page.orderBy == 'Role') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_UpdatedAt">Updated At<% if (page.orderBy == 'UpdatedAt') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
*}
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('ipaddr')) %>">
				<td><%= _.escape(item.get('ipaddr') || '') %></td>
				<td><%= _.escape(item.get('mysqlDbCluster') || '') %></td>
				<td><%= _.escape(item.get('mysqlDbClusterPart') || '') %></td>
				<td><%= _.escape(item.get('platform') || '') %></td>
				<td><%= _.escape(item.get('unmonitoredUntil') || '') %></td>
{* uncomment to show additional colums *}
{*
				<td><%= _.escape(item.get('role') || '') %></td>
				<td><%if (item.get('updatedAt')) { %><%= _date(app.parseDate(item.get('updatedAt'))).format('MMM D, YYYY h:mm A') %><% } else { %>NULL<% } %></td>
*}
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="serverModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="ipaddrInputContainer" class="control-group">
					<label class="control-label" for="ipaddr">Ipaddr</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ipaddr" placeholder="Ipaddr" value="<%= _.escape(item.get('ipaddr') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlDbClusterInputContainer" class="control-group">
					<label class="control-label" for="mysqlDbCluster">Mysql Db Cluster</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mysqlDbCluster" placeholder="Mysql Db Cluster" value="<%= _.escape(item.get('mysqlDbCluster') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mysqlDbClusterPartInputContainer" class="control-group">
					<label class="control-label" for="mysqlDbClusterPart">Mysql Db Cluster Part</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mysqlDbClusterPart" placeholder="Mysql Db Cluster Part" value="<%= _.escape(item.get('mysqlDbClusterPart') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="platformInputContainer" class="control-group">
					<label class="control-label" for="platform">Platform</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="platform" placeholder="Platform" value="<%= _.escape(item.get('platform') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="unmonitoredUntilInputContainer" class="control-group">
					<label class="control-label" for="unmonitoredUntil">Unmonitored Until</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="unmonitoredUntil" placeholder="Unmonitored Until" value="<%= _.escape(item.get('unmonitoredUntil') || '') %>" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="roleInputContainer" class="control-group">
					<label class="control-label" for="role">Role</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="role" placeholder="Role" value="<%= _.escape(item.get('role') || '') %>" />
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
		<form id="deleteServerButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteServerButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Server</button>
						<span id="confirmDeleteServerContainer" class="hide">
							<button id="cancelDeleteServerButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteServerButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="serverDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Server
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="serverModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveServerButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="serverCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newServerButton" class="btn btn-primary">Add Server</button>
	</p>

{/block}
