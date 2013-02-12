/**
 * backbone model definitions for DBA METADB
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 5000;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;

/**
 * CnameServer Backbone Model
 */
model.CnameServerModel = Backbone.Model.extend({
	urlRoot: 'api/cnameserver',
	idAttribute: 'cnameId',
	cnameId: '',
	serverId: '',
	defaults: {
		'cnameId': null,
		'serverId': ''
	}
});

/**
 * CnameServer Backbone Collection
 */
model.CnameServerCollection = Backbone.Collection.extend({
	url: 'api/cnameservers',
	model: model.CnameServerModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Cname Backbone Model
 */
model.CnameModel = Backbone.Model.extend({
	urlRoot: 'api/cname',
	idAttribute: 'id',
	id: '',
	fqdn: '',
	hostId: '',
	vipHostId: '',
	defaults: {
		'id': null,
		'fqdn': '',
		'hostId': '',
		'vipHostId': ''
	}
});

/**
 * Cname Backbone Collection
 */
model.CnameCollection = Backbone.Collection.extend({
	url: 'api/cnames',
	model: model.CnameModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Facts Backbone Model
 */
model.FactsModel = Backbone.Model.extend({
	urlRoot: 'api/facts',
	idAttribute: 'id',
	id: '',
	name: '',
	defaultValue: '',
	defaults: {
		'id': null,
		'name': '',
		'defaultValue': ''
	}
});

/**
 * Facts Backbone Collection
 */
model.FactsCollection = Backbone.Collection.extend({
	url: 'api/factses',
	model: model.FactsModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * HostFacts Backbone Model
 */
model.HostFactsModel = Backbone.Model.extend({
	urlRoot: 'api/hostfacts',
	idAttribute: 'hostId',
	hostId: '',
	factId: '',
	value: '',
	updatedAt: '',
	defaults: {
		'hostId': null,
		'factId': '',
		'value': '',
		'updatedAt': ''
	}
});

/**
 * HostFacts Backbone Collection
 */
model.HostFactsCollection = Backbone.Collection.extend({
	url: 'api/hostfactses',
	model: model.HostFactsModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * HostMysqlAttribute Backbone Model
 */
model.HostMysqlAttributeModel = Backbone.Model.extend({
	urlRoot: 'api/hostmysqlattribute',
	idAttribute: 'hostId',
	hostId: '',
	mysqlAttributeId: '',
	value: '',
	updatedAt: '',
	defaults: {
		'hostId': null,
		'mysqlAttributeId': '',
		'value': '',
		'updatedAt': ''
	}
});

/**
 * HostMysqlAttribute Backbone Collection
 */
model.HostMysqlAttributeCollection = Backbone.Collection.extend({
	url: 'api/hostmysqlattributes',
	model: model.HostMysqlAttributeModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * HostNote Backbone Model
 */
model.HostNoteModel = Backbone.Model.extend({
	urlRoot: 'api/hostnote',
	idAttribute: 'hostId',
	hostId: '',
	createdAt: '',
	createdBy: '',
	notes: '',
	removedFlag: '',
	defaults: {
		'hostId': null,
		'createdAt': '',
		'createdBy': '',
		'notes': '',
		'removedFlag': ''
	}
});

/**
 * HostNote Backbone Collection
 */
model.HostNoteCollection = Backbone.Collection.extend({
	url: 'api/hostnotes',
	model: model.HostNoteModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Host Backbone Model
 */
model.HostModel = Backbone.Model.extend({
	urlRoot: 'api/host',
	idAttribute: 'id',
	id: '',
	ipaddr: '',
	fqdn: '',
	mysqlDbCluster: '',
	mysqlDbClusterPart: '',
	platform: '',
	unmonitoredUntil: '',
	role: '',
	updatedAt: '',
	newRole: '',
	type: '',
	puppetBranch: '',
	defaults: {
		'id': null,
		'ipaddr': '',
		'fqdn': '',
		'mysqlDbCluster': '',
		'mysqlDbClusterPart': '',
		'platform': '',
		'unmonitoredUntil': '',
		'role': '',
		'updatedAt': '',
		'newRole': '',
		'type': '',
		'puppetBranch': ''
	}
});

/**
 * Host Backbone Collection
 */
model.HostCollection = Backbone.Collection.extend({
	url: 'api/hosts',
	model: model.HostModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * MysqlAttribute Backbone Model
 */
model.MysqlAttributeModel = Backbone.Model.extend({
	urlRoot: 'api/mysqlattribute',
	idAttribute: 'id',
	id: '',
	name: '',
	defaultValue: '',
	defaults: {
		'id': null,
		'name': '',
		'defaultValue': ''
	}
});

/**
 * MysqlAttribute Backbone Collection
 */
model.MysqlAttributeCollection = Backbone.Collection.extend({
	url: 'api/mysqlattributes',
	model: model.MysqlAttributeModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Server Backbone Model
 */
model.ServerModel = Backbone.Model.extend({
	urlRoot: 'api/server',
	idAttribute: 'ipaddr',
	ipaddr: '',
	mysqlDbCluster: '',
	mysqlDbClusterPart: '',
	platform: '',
	unmonitoredUntil: '',
	role: '',
	updatedAt: '',
	defaults: {
		'ipaddr': null,
		'mysqlDbCluster': '',
		'mysqlDbClusterPart': '',
		'platform': '',
		'unmonitoredUntil': '',
		'role': '',
		'updatedAt': ''
	}
});

/**
 * Server Backbone Collection
 */
model.ServerCollection = Backbone.Collection.extend({
	url: 'api/servers',
	model: model.ServerModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * VipServer Backbone Model
 */
model.VipServerModel = Backbone.Model.extend({
	urlRoot: 'api/vipserver',
	idAttribute: 'vipId',
	vipId: '',
	serverId: '',
	defaults: {
		'vipId': null,
		'serverId': ''
	}
});

/**
 * VipServer Backbone Collection
 */
model.VipServerCollection = Backbone.Collection.extend({
	url: 'api/vipservers',
	model: model.VipServerModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Viphost Backbone Model
 */
model.ViphostModel = Backbone.Model.extend({
	urlRoot: 'api/viphost',
	idAttribute: 'ipaddr',
	ipaddr: '',
	fqdn: '',
	defaults: {
		'ipaddr': null,
		'fqdn': ''
	}
});

/**
 * Viphost Backbone Collection
 */
model.ViphostCollection = Backbone.Collection.extend({
	url: 'api/viphosts',
	model: model.ViphostModel,

	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	collectionHasChanged: true,

	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, xhr) {

		// check the raw response to determine if collection actually changed
		// note xhr param was removed from backbone 0.99
		var responseText = xhr ? xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastResponseText = responseText;

		var rows;

		if (response.currentPage)
		{
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}
		else
		{
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

