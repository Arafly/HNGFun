/**
 * @license
 * Copyright (c) 2014, 2018, Oracle and/or its affiliates.
 * The Universal Permissive License (UPL), Version 1.0
 */
"use strict";define(["ojs/ojcore","jquery","ojs/ojeventtarget","ojs/ojdataprovider"],function(t,e){var n=function(){function e(t){this.tableDataSource=t,this._KEY="key",this._KEYS="keys",this._AFTERKEYS="afterKeys",this._DIRECTION="direction",this._STARTINDEX="startIndex",this._ATTRIBUTE="attribute",this._SILENT="silent",this._SORT="sort",this._SORTCRITERIA="sortCriteria",this._PAGESIZE="pageSize",this._DATA="data",this._METADATA="metadata",this._INDEXES="indexes",this._OFFSET="offset",this._REFRESH="refresh",this._SIZE="size",this._VALUE="value",this._DONE="done",this._FETCHPARAMETERS="fetchParameters",this._CONTAINSPARAMETERS="containsParameters",this._RESULTS="results",this._ADD="add",this._REMOVE="remove",this._UPDATE="update",this._FETCHTYPE="fetchType",this.AsyncIterable=function(){return function(t,e){this._parent=t,this._asyncIterator=e,this[Symbol.asyncIterator]=function(){return this._asyncIterator}}}(),this.AsyncIterator=function(){function t(t,e,n){this._parent=t,this._nextFunc=e,this._params=n,this._fetchFirst=!0}return t.prototype.next=function(){var t=this._fetchFirst;return this._fetchFirst=!1,this._nextFunc(this._params,t)},t}(),this.AsyncIteratorResult=function(){return function(t,e,n){this._parent=t,this.value=e,this.done=n,this[t._VALUE]=e,this[t._DONE]=n}}(),this.FetchByKeysResults=function(){return function(t,e,n){this._parent=t,this.fetchParameters=e,this.results=n,this[t._FETCHPARAMETERS]=e,this[t._RESULTS]=n}}(),this.ContainsKeysResults=function(){return function(t,e,n){this._parent=t,this.containsParameters=e,this.results=n,this[t._CONTAINSPARAMETERS]=e,this[t._RESULTS]=n}}(),this.FetchListResult=function(){return function(t,e,n,i){this._parent=t,this.fetchParameters=e,this.data=n,this.metadata=i,this[t._FETCHPARAMETERS]=e,this[t._DATA]=n,this[t._METADATA]=i}}(),this.Item=function(){return function(t,e,n){this._parent=t,this.metadata=e,this.data=n,this[t._METADATA]=e,this[t._DATA]=n}}(),this.ItemMetadata=function(){return function(t,e){this._parent=t,this.key=e,this[t._KEY]=e}}(),this.FetchByOffsetResults=function(){return function(t,e,n,i){this._parent=t,this.fetchParameters=e,this.results=n,this.done=i,this[t._FETCHPARAMETERS]=e,this[t._RESULTS]=n,this[t._DONE]=i}}(),this.FetchListParameters=function(){return function(t,e,n){this._parent=t,this.size=e,this.sortCriteria=n,this[t._SIZE]=e,this[t._SORTCRITERIA]=n}}(),this.SortCriterion=function(){return function(t,e,n){this._parent=t,this.attribute=e,this.direction=n,this[t._ATTRIBUTE]=e,this[t._DIRECTION]=n}}(),this.DataProviderMutationEventDetail=function(){return function(t,e,n,i){this._parent=t,this.add=e,this.remove=n,this.update=i,this[t._ADD]=e,this[t._REMOVE]=n,this[t._UPDATE]=i}}(),this.DataProviderOperationEventDetail=function(){return function(t,e,n,i,a){this._parent=t,this.keys=e,this.metadata=n,this.data=i,this.indexes=a,this[t._KEYS]=e,this[t._METADATA]=n,this[t._DATA]=i,this[t._INDEXES]=a}}(),this.DataProviderAddOperationEventDetail=function(){return function(t,e,n,i,a,r){this._parent=t,this.keys=e,this.afterKeys=n,this.metadata=i,this.data=a,this.indexes=r,this[t._KEYS]=e,this[t._AFTERKEYS]=n,this[t._METADATA]=i,this[t._DATA]=a,this[t._INDEXES]=r}}(),this._addTableDataSourceEventListeners(t),this[this._OFFSET]=0}return e.prototype.containsKeys=function(t){var e=this,n=[];return t[this._KEYS].forEach(function(t){n.push(e.tableDataSource.get(t))}),Promise.all(n).then(function(n){var i=new Set;return n.map(function(t){i.add(t[e._KEY])}),Promise.resolve(new e.ContainsKeysResults(e,t,i))})},e.prototype.fetchByKeys=function(t){var e=this,n=[];return t[this._KEYS].forEach(function(t){n.push(e.tableDataSource.get(t))}),Promise.all(n).then(function(n){var i=new Map;return n.map(function(t){var n=t[e._KEY],a=t[e._DATA];i.set(n,new e.Item(e,new e.ItemMetadata(e,n),a))}),Promise.resolve(new e.FetchByKeysResults(e,t,i))})},e.prototype.fetchByOffset=function(t){var e=this,n=null!=t?t[this._SIZE]:-1,i=null!=t?t[this._SORTCRITERIA]:null,a=null!=t&&t[this._OFFSET]>0?t[this._OFFSET]:0,r=new this.FetchListParameters(this,n,i),s=this._getFetchFunc(r,a),o=s[this._VALUE],u=s[this._DONE],h=o[this._DATA],c=o[this._METADATA].map(function(t){return t[e._KEY]}),_=h.map(function(t,n){return new e.Item(e,t,c[n])});return Promise.resolve(new this.FetchByOffsetResults(this,t,_,u))},e.prototype.fetchFirst=function(t){return this._isPagingModelTableDataSource()||(this._startIndex=0),new this.AsyncIterable(this,new this.AsyncIterator(this,this._getFetchFunc(t),t))},e.prototype.getCapability=function(t){return t==this._SORT&&"full"==this.tableDataSource.getCapability(t)?{attributes:"multiple"}:null},e.prototype.getTotalSize=function(){return Promise.resolve(this.tableDataSource.totalSize())},e.prototype.isEmpty=function(){return this.tableDataSource.totalSize()>0?"no":"yes"},e.prototype.getPage=function(){return this._isPagingModelTableDataSource()?this.tableDataSource.getPage():-1},e.prototype.setPage=function(t,e){return this._isPagingModelTableDataSource()?this.tableDataSource.setPage(t,e):Promise.reject(null)},e.prototype.getStartItemIndex=function(){return this._isPagingModelTableDataSource()?this.tableDataSource.getStartItemIndex():-1},e.prototype.getEndItemIndex=function(){return this._isPagingModelTableDataSource()?this.tableDataSource.getEndItemIndex():-1},e.prototype.getPageCount=function(){return this._isPagingModelTableDataSource()?this.tableDataSource.getPageCount():-1},e.prototype.totalSize=function(){return this._isPagingModelTableDataSource()?this.tableDataSource.totalSize():-1},e.prototype.totalSizeConfidence=function(){return this._isPagingModelTableDataSource()?this.tableDataSource.totalSizeConfidence():null},e.prototype._getFetchFunc=function(t,e){var n=this;if(null!=t&&null!=t[this._SORTCRITERIA]){var i=t[this._SORTCRITERIA][0][this._ATTRIBUTE],a=t[this._SORTCRITERIA][0][this._DIRECTION];return this._ignoreSortEvent=!0,this._isPagingModelTableDataSource()||(this._startIndex=0),function(t,i){return function(a,r){if(r){var s={};return s[n._KEY]=t,s[n._DIRECTION]=i,n[n._OFFSET]=0,n.tableDataSource.sort(s).then(function(){return n._ignoreSortEvent=!1,n._getTableDataSourceFetch(a,e)(a)})}return n._getTableDataSourceFetch(a,e)(a)}}(i,a)}return this._getTableDataSourceFetch(t,e)},e.prototype._getTableDataSourceFetch=function(t,e){var n=this;return function(t,i){var a={};if(e=e>0?e:0,null!=n._startIndex&&(a[n._STARTINDEX]=n._startIndex+e),a[n._PAGESIZE]=null!=t&&t[n._SIZE]>0?t[n._SIZE]:null,n._isPagingModelTableDataSource()||(a[n._SILENT]=!0),null!=n.tableDataSource[n._SORTCRITERIA]&&null==t[n._SORTCRITERIA]){t[n._SORTCRITERIA]=[];var r=new n.SortCriterion(n,n.tableDataSource[n._SORTCRITERIA][n._KEY],n.tableDataSource[n._SORTCRITERIA][n._DIRECTION]);t[n._SORTCRITERIA].push(r)}return a[n._FETCHTYPE]=t[n._FETCHTYPE],n._isFetching=!0,new Promise(function(e,i){n._fetchResolveFunc=e,n._fetchRejectFunc=i,n._fetchParams=t,n._requestEventTriggered||n.tableDataSource.fetch(a).then(function(i){if(null!==i){n._isFetching=!1,void 0===i&&((i={})[n._KEYS]=[],i[n._DATA]=[]);var r=[];null!=i[n._KEYS]&&(r=i[n._KEYS].map(function(t){return new n.ItemMetadata(n,t)})),null==n._startIndex&&(n._startIndex=0);var s=!1;n._startIndex=n._startIndex+i[n._DATA].length,"actual"==n.tableDataSource.totalSizeConfidence()&&n.tableDataSource.totalSize()>0&&n._startIndex>=n.tableDataSource.totalSize()?s=!0:a[n._PAGESIZE]>0&&i[n._DATA].length<a[n._PAGESIZE]?s=!0:0==i[n._DATA].length&&(s=!0),n._fetchResolveFunc=null,n._fetchParams=null,e(new n.AsyncIteratorResult(n,new n.FetchListResult(n,t,i[n._DATA],r),s))}},function(t){i(t)})})}},e.prototype._addTableDataSourceEventListeners=function(e){var n=this;e.on("sync",function(e){if(n._startIndex=null,e[n._STARTINDEX]>0&&(n._startIndex=e[n._STARTINDEX],n[n._OFFSET]=n._startIndex),n._fetchResolveFunc&&null!=e[n._KEYS]){n._isFetching=!1;var i=e[n._KEYS].map(function(t){return new n.ItemMetadata(n,t)}),a=!1;"actual"==n.tableDataSource.totalSizeConfidence()&&n.tableDataSource.totalSize()>0&&n._startIndex>=n.tableDataSource.totalSize()&&(a=!0),n._fetchResolveFunc(new n.AsyncIteratorResult(n,new n.FetchListResult(n,n._fetchParams,e[n._DATA],i),a)),n._fetchResolveFunc=null,n._fetchParams=null}else n._requestEventTriggered||n.dispatchEvent(new t.DataProviderRefreshEvent);n._requestEventTriggered=!1}),e.on("add",function(e){var i=e[n._KEYS].map(function(t){return new n.ItemMetadata(n,t)}),a=new Set;e[n._KEYS].map(function(t){a.add(t)});var r=new n.DataProviderAddOperationEventDetail(n,a,null,i,e[n._DATA],e[n._INDEXES]),s=new n.DataProviderMutationEventDetail(n,r,null,null);n.dispatchEvent(new t.DataProviderMutationEvent(s))}),e.on("remove",function(e){var i=e[n._KEYS].map(function(t){return new n.ItemMetadata(n,t)}),a=new Set;e[n._KEYS].map(function(t){a.add(t)});var r=new n.DataProviderOperationEventDetail(n,a,i,e[n._DATA],e[n._INDEXES]),s=new n.DataProviderMutationEventDetail(n,null,r,null);n.dispatchEvent(new t.DataProviderMutationEvent(s))}),e.on("reset",function(e){n._requestEventTriggered||(n._startIndex=0,n.dispatchEvent(new t.DataProviderRefreshEvent))}),e.on(this._SORT,function(e){n._ignoreSortEvent||(n._startIndex=null,n.dispatchEvent(new t.DataProviderRefreshEvent))}),e.on("change",function(e){var i=e[n._KEYS].map(function(t){return new n.ItemMetadata(n,t)}),a=new Set;e[n._KEYS].map(function(t){a.add(t)});var r=new n.DataProviderOperationEventDetail(n,a,i,e[n._DATA],e[n._INDEXES]),s=new n.DataProviderMutationEventDetail(n,null,null,r);n.dispatchEvent(new t.DataProviderMutationEvent(s))}),e.on(this._REFRESH,function(e){n._isFetching||n._requestEventTriggered||(null!=e[n._OFFSET]?n._startIndex=e[n._OFFSET]:n._startIndex=null,n.dispatchEvent(new t.DataProviderRefreshEvent)),n._requestEventTriggered=!1}),e.on("request",function(e){void 0!==t.Model&&e instanceof t.Model||n._isFetching||(e[n._STARTINDEX]>0&&0==n.getStartItemIndex()&&(n._startIndex=e[n._STARTINDEX]),n._requestEventTriggered=!0,n.dispatchEvent(new t.DataProviderRefreshEvent))}),e.on("error",function(t){n._fetchRejectFunc&&n._fetchRejectFunc(t),n._isFetching=!1,n._requestEventTriggered=!1}),e.on("page",function(e){n._isFetching=!1,n._requestEventTriggered=!1;var i={};i.detail=e,n.dispatchEvent(new t.GenericEvent(t.PagingModel.EventType.PAGE,i))})},e.prototype._isPagingModelTableDataSource=function(){return null!=this.tableDataSource.getStartItemIndex},e}();t.EventTargetMixin.applyMixin(n),t.TableDataSourceAdapter=n,t.TableDataSourceAdapter=n});