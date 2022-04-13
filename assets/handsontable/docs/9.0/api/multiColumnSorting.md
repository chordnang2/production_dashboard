---
title: MultiColumnSorting
metaTitle: MultiColumnSorting - Plugin - Handsontable Documentation
permalink: /9.0/api/multi-column-sorting
canonicalUrl: /api/multi-column-sorting
editLink: false
---

# MultiColumnSorting

[[toc]]

## Description

This plugin sorts the view by columns (but does not sort the data source!). To enable the plugin, set the
[Options#multiColumnSorting](@/api/metaSchema.md#multicolumnsorting) property to the correct value (see the examples below).

**Example**  
```js
// as boolean
multiColumnSorting: true

// as an object with initial sort config (sort ascending for column at index 1 and then sort descending for column at index 0)
multiColumnSorting: {
  initialConfig: [{
    column: 1,
    sortOrder: 'asc'
  }, {
    column: 0,
    sortOrder: 'desc'
  }]
}

// as an object which define specific sorting options for all columns
multiColumnSorting: {
  sortEmptyCells: true, // true = the table sorts empty cells, false = the table moves all empty cells to the end of the table (by default)
  indicator: true, // true = shows indicator for all columns (by default), false = don't show indicator for columns
  headerAction: true, // true = allow to click on the headers to sort (by default), false = turn off possibility to click on the headers to sort
  compareFunctionFactory: function(sortOrder, columnMeta) {
    return function(value, nextValue) {
      // Some value comparisons which will return -1, 0 or 1...
    }
  }
}

// as an object passed to the `column` property, allows specifying a custom options for the desired column.
// please take a look at documentation of `column` property: [Options#columns](@/api/metaSchema.md#columns)
columns: [{
  multiColumnSorting: {
    indicator: false, // disable indicator for the first column,
    sortEmptyCells: true,
    headerAction: false, // clicks on the first column won't sort
    compareFunctionFactory: function(sortOrder, columnMeta) {
      return function(value, nextValue) {
        return 0; // Custom compare function for the first column (don't sort)
      }
    }
  }
}]
```

## Options

### multiColumnSorting
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/dataMap/metaManager/metaSchema.js#L2030

:::

_multiColumnSorting.multiColumnSorting : boolean | object_

Turns on [Multi-column sorting](@/guides/rows/row-sorting.md). Can be either a boolean (`true` / `false`) or an object with a declared sorting options:
* `initialConfig` - Array containing objects, every with predefined keys:
  * `column` - sorted column
  * `sortOrder` - order in which column will be sorted
    * `'asc'` = ascending
    * `'desc'` = descending
* `indicator` - display status for sorting order indicator (an arrow icon in the column header, specifying the sorting order).
  * `true` = show sort indicator for sorted columns
  * `false` = don't show sort indicator for sorted columns
* `headerAction` - allow to click on the headers to sort
  * `true` = turn on possibility to click on the headers to sort
  * `false` = turn off possibility to click on the headers to sort
* `sortEmptyCells` - how empty values ([more information here](@/api/metaSchema.md#allowempty)) should be handled
  * `true` = the table sorts empty cells
  * `false` = the table moves all empty cells to the end of the table
* `compareFunctionFactory` - curry function returning compare function; compare function should work in the same way as function which is handled by native `Array.sort` method); please take a look at below examples for more information.

**Default**: <code>undefined</code>  
**Example**  
```js
// as boolean
multiColumnSorting: true

// as an object with initial sort config (sort ascending for column at index 1 and then sort descending for column at index 0)
multiColumnSorting: {
  initialConfig: [{
    column: 1,
    sortOrder: 'asc'
  }, {
    column: 0,
    sortOrder: 'desc'
  }]
}

// as an object which define specific sorting options for all columns
multiColumnSorting: {
  sortEmptyCells: true, // true = the table sorts empty cells, false = the table moves all empty cells to the end of the table
  indicator: true, // true = shows indicator for all columns, false = don't show indicator for columns
  headerAction: false, // true = allow to click on the headers to sort, false = turn off possibility to click on the headers to sort
  compareFunctionFactory: function(sortOrder, columnMeta) {
    return function(value, nextValue) {
      // Some value comparisons which will return -1, 0 or 1...
    }
  }
}
```

## Methods

### clearSort
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L151

:::

_multiColumnSorting.clearSort()_

Clear the sort performed on the table.



### disablePlugin
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L115

:::

_multiColumnSorting.disablePlugin()_

Disables the plugin functionality for this Handsontable instance.



### enablePlugin
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L104

:::

_multiColumnSorting.enablePlugin()_

Enables the plugin functionality for this Handsontable instance.



### getSortConfig
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L172

:::

_multiColumnSorting.getSortConfig([column]) ⇒ undefined | object | Array_

Get sort configuration for particular column or for all sorted columns. Objects contain `column` and `sortOrder` properties.

**Note**: Please keep in mind that returned objects expose **visual** column index under the `column` key. They are handled by the `sort` function.


| Param | Type | Description |
| --- | --- | --- |
| [column] | `number` | `optional` Visual column index. |



### isEnabled
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L97

:::

_multiColumnSorting.isEnabled() ⇒ boolean_

Checks if the plugin is enabled in the Handsontable settings. This method is executed in [Hooks#beforeInit](@/api/pluginHooks.md#beforeinit)
hook and if it returns `true` than the [MultiColumnSorting#enablePlugin](@/api/multiColumnSorting.md#enableplugin) method is called.



### isSorted
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L160

:::

_multiColumnSorting.isSorted() ⇒ boolean_

Checks if the table is sorted (any column have to be sorted).



### setSortConfig
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L200

:::

_multiColumnSorting.setSortConfig(sortConfig)_

Warn: Useful mainly for providing server side sort implementation (see in the example below). It doesn't sort the data set. It just sets sort configuration for all sorted columns.
Note: Please keep in mind that this method doesn't re-render the table.

**Example**  
```js
beforeColumnSort: function(currentSortConfig, destinationSortConfigs) {
  const columnSortPlugin = this.getPlugin('multiColumnSorting');

  columnSortPlugin.setSortConfig(destinationSortConfigs);

  // const newData = ... // Calculated data set, ie. from an AJAX call.

  this.loadData(newData); // Load new data set and re-render the table.

  return false; // The blockade for the default sort action.
}
```

| Param | Type | Description |
| --- | --- | --- |
| sortConfig | `undefined` <br/> `object` <br/> `Array` | Single column sort configuration or full sort configuration (for all sorted columns). The configuration object contains `column` and `sortOrder` properties. First of them contains visual column index, the second one contains sort order (`asc` for ascending, `desc` for descending). |



### sort
  
::: source-code-link https://github.com/handsontable/handsontable/blob/4d56e68f9cb6412b841663278b2e0eb3ad181233/src/plugins/multiColumnSorting/multiColumnSorting.js#L144

:::

_multiColumnSorting.sort(sortConfig)_

Sorts the table by chosen columns and orders.

**Emits**: [`Hooks#event:beforeColumnSort`](@/api/pluginHooks.md#beforecolumnsort), [`Hooks#event:afterColumnSort`](@/api/pluginHooks.md#aftercolumnsort)  
**Example**  
```js
// sort ascending first visual column
hot.getPlugin('multiColumnSorting').sort({ column: 0, sortOrder: 'asc' });

// sort first two visual column in the defined sequence
hot.getPlugin('multiColumnSorting').sort([{
  column: 1, sortOrder: 'asc'
}, {
  column: 0, sortOrder: 'desc'
}]);
```

| Param | Type | Description |
| --- | --- | --- |
| sortConfig | `undefined` <br/> `object` <br/> `Array` | Single column sort configuration or full sort configuration (for all sorted columns). The configuration object contains `column` and `sortOrder` properties. First of them contains visual column index, the second one contains sort order (`asc` for ascending, `desc` for descending). **Note**: Please keep in mind that every call of `sort` function set an entirely new sort order. Previous sort configs aren't preserved. |


