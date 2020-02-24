<?php
namespace Plenty\Modules\Webshop\ItemSearch\Factories;

use Plenty\Modules\Cloud\ElasticSearch\Lib\Query\Type\TypeInterface;
use Plenty\Modules\Cloud\ElasticSearch\Lib\Search\Aggregation\AggregationInterface;
use Plenty\Modules\Cloud\ElasticSearch\Lib\Source\Mutator\MutatorInterface;
use Plenty\Modules\Pim\SearchService\Helper\FacetHelper;
use Plenty\Modules\Webshop\Contracts\LocalizationRepositoryContract;
use Plenty\Modules\Webshop\ItemSearch\Extensions\FacetFilterExtension;

/**
 * FacetSearchFactory
 */
abstract class FacetSearchFactory 
{

	const SORTING_ORDER_ASC = 'asc';

	const SORTING_ORDER_DESC = 'desc';

	const INHERIT_AGGREGATIONS = 'aggregations';

	const INHERIT_COLLAPSE = 'collapse';

	const INHERIT_EXTENSIONS = 'extensions';

	const INHERIT_FILTERS = 'filters';

	const INHERIT_MUTATORS = 'mutators';

	const INHERIT_PAGINATION = 'pagination';

	const INHERIT_RESULT_FIELDS = 'resultFields';

	const INHERIT_SORTING = 'sorting';

	/**
	 * Create a factory instance depending on a given set of facet values.
	 */
	abstract public static function create(
		 $facets
	):self;

	/**
	 * Register extension to filter facets by minimum hit count.
	 */
	abstract public function withMinimumCount(
	):self;

	abstract public function setAdminPreview(
		bool $isAdminPreview
	):self;

	/**
	 * Filter active variations
	 */
	abstract public function isActive(
	):self;

	/**
	 * Filter inactive variations
	 */
	abstract public function isInactive(
	):self;

	/**
	 * Filter variation by a single item id
	 */
	abstract public function hasItemId(
		int $itemId
	):self;

	/**
	 * Filter variations by multiple item ids
	 */
	abstract public function hasItemIds(
		array $itemIds
	):self;

	/**
	 * Filter variation by a single variation id.
	 */
	abstract public function hasVariationId(
		int $variationId
	):self;

	/**
	 * Filter variations by multiple variation ids.
	 */
	abstract public function hasVariationIds(
		array $variationIds
	):self;

	/**
	 * Filter variations by multiple availability ids.
	 */
	abstract public function hasAtLeastOneAvailability(
		array $availabilityIds
	):self;

	/**
	 * Filter variations by multiple availability ids.
	 */
	abstract public function hasSupplier(
		int $supplierId
	):self;

	/**
	 * Filter manufacturers by id.
	 */
	abstract public function hasManufacturer(
		int $manufacturerId
	):self;

	/**
	 * Filter variations by multiple property ids.
	 */
	abstract public function hasEachProperty(
		array $propertyIds
	):self;

	/**
	 * Filter only main variations
	 */
	abstract public function isMain(
	):self;

	/**
	 * Filter only child variations
	 */
	abstract public function isChild(
	):self;

	/**
	 * Filter by visibility in category list.
	 */
	abstract public function isHiddenInCategoryList(
		bool $isHidden = true
	):self;

	/**
	 * Filter variations by isSalable flag
	 */
	abstract public function isSalable(
	):self;

	/**
	 * Filter variations by visibility for client
	 */
	abstract public function isVisibleForClient(
		int $clientId = null
	):self;

	/**
	 * Filter variations having texts in a given language.
	 */
	abstract public function hasNameInLanguage(
		string $type = "hasAnyNameInLanguage", 
		string $lang = null
	):self;

	/**
	 * Filter variations contained in a category.
	 */
	abstract public function isInCategory(
		int $categoryId
	):self;

	/**
	 * Filter variations having at least on price.
	 */
	abstract public function hasAtLeastOnePrice(
		array $priceIds
	):self;

	/**
	 * Filter variations having at least one price accessible by current customer.
	 */
	abstract public function hasPriceForCustomer(
	):self;

	abstract public function hasPriceInRange(
		float $priceMin, 
		float $priceMax
	):self;

	abstract public function hasTag(
		int $tagId
	):self;

	abstract public function hasAnyTag(
		array $tagIds
	):self;

	/**
	 * Group results depending on a config value.
	 */
	abstract public function groupByTemplateConfig(
	):self;

	/**
	 * Filter variations having a cross selling relation to a given item.
	 */
	abstract public function isCrossSellingItem(
		int $itemId, 
		string $relation
	):self;

	/**
	 * Filter variations by facets.
	 */
	abstract public function hasFacets(
		 $facetValues, 
		int $clientId = null, 
		string $lang = null
	):self;

	/**
	 * Filter variations by given search string.
	 */
	abstract public function hasSearchString(
		string $query, 
		string $lang = null, 
		string $a = "", 
		string $b = ""
	):self;

	/**
	 * Filter variations by searching names
	 */
	abstract public function hasNameString(
		string $query, 
		string $lang = null
	):self;

	/**
	 * Only request given language.
	 */
	abstract public function withLanguage(
		string $lang = null
	):self;

	/**
	 * Include images in result
	 */
	abstract public function withImages(
		int $clientId = null
	):self;

	/**
	 * Includes VariatonAttributeMap for variation select
	 */
	abstract public function withAttributes(
	):self;

	abstract public function withPropertyGroups(
	):self;

	abstract public function withOrderPropertySelectionValues(
	):self;

	abstract public function withVariationProperties(
	):self;

	/**
	 * Append URLs to result.
	 */
	abstract public function withUrls(
	):self;

	/**
	 * Append prices to result.
	 */
	abstract public function withPrices(
		array $quantities = []
	):self;

	/**
	 * Set result as current category
	 */
	abstract public function withCurrentCategory(
	):self;

	/**
	 * Append default item image if images are requested by result fields and item does not have any image
	 */
	abstract public function withDefaultImage(
	):self;

	abstract public function withBundleComponents(
	):self;

	abstract public function withLinkToContent(
	):self;

	abstract public function withGroupedAttributeValues(
	):self;

	abstract public function withReducedResults(
		 $removeProperties = false
	):self;

	abstract public function withAvailability(
	):self;

	abstract public function withTags(
	):self;

	/**
	 * Create a new factory instance based on properties of an existing factory.
	 */
	abstract public function inherit(
		array $inheritedProperties = []
	):BaseSearchFactory;

	/**
	 * Add a mutator
	 */
	abstract public function withMutator(
		MutatorInterface $mutator
	):self;

	/**
	 * Add a filter. Will create a new instance of the filter class if not already created.
	 */
	abstract public function createFilter(
		string $filterClass, 
		array $params = []
	);

	/**
	 * Add a filter. Will override existing filter instances.
	 */
	abstract public function withFilter(
		TypeInterface $filter
	):self;

	/**
	 * Set fields to be contained in search result.
	 */
	abstract public function withResultFields(
		 $fields
	):self;

	abstract public function getResultFields(
	):array;

	/**
	 * Add an extension.
	 */
	abstract public function withExtension(
		string $extensionClass, 
		array $extensionParams = []
	):self;

	/**
	 * Get all registered extensions
	 */
	abstract public function getExtensions(
	):array;

	/**
	 * Get all registered mutators
	 */
	abstract public function getMutators(
	):array;

	/**
	 * Add an aggregation
	 */
	abstract public function withAggregation(
		AggregationInterface $aggregation
	):self;

	/**
	 * Set pagination parameters.
	 */
	abstract public function setPage(
		int $page, 
		int $itemsPerPage
	):self;

	/**
	 * Add sorting parameters
	 */
	abstract public function sortBy(
		string $field, 
		string $order = \Plenty\Modules\Webshop\ItemSearch\Factories\VariationSearchFactory::SORTING_ORDER_DESC
	):self;

	/**
	 * Add multiple sorting parameters
	 */
	abstract public function sortByMultiple(
		array $sortingList
	):self;

	abstract public function setOrder(
		 $idList
	);

	/**
	 * Group results by field
	 */
	abstract public function groupBy(
		string $field
	):self;

}