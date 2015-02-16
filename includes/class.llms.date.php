<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Dates Class
* 
* Manages formatting dates for I/O and display
*/
class LLMS_Date {

	/**
	 * Constructor
	 */
	public function __construct() {

	}

	/**
	 * Set date to dd/mm/yyyy
	 * Optional type value for converting AU date format
	 * Converts any type of date format
	 * 
	 * @param  [date] $date [datestring]
	 * @return [date]       [datestring]
	 */
	public static function pretty_date( $date, $type = '' ) {
		
		if ( $type === 'au' ) {
			return date( 'd/m/Y', strtotime( $date ) );
		} else {
			return date( 'm/d/Y', strtotime( $date ) );
		}
		
	}

	/**
	 * Date filter options for analytics
	 * @return [array] [array of date filters]
	 */
	public static function date_filters() {
		$filters = array(		
			'none' => 'Enter Specific Dates',
			'week' => 'Last 7 Days',
			'month' => 'Current Month',
			'quarter' => 'Current Quarter',
			'year' => 'Current Year'
		);
		return $filters;
	}

	/**
	 * Converts date to yyyymmdd
	 * Converts any type of date format
	 * Optional field type accepts 'au' to convert Australian dd/mm/yyyy date format
	 * Used for date db storage
	 * 
	 * @param  [date] $date [datestring]
	 * @param  [type] $type [optional field for managing AU date conversions]
	 * @return [date]       [datestring]
	 */
	public static function db_date( $date, $type = '' ) {

		if ( $type === 'au' ) {
			list($d, $m, $y) = preg_split('/\//', $date);
			$date = sprintf('%4d-%02d-%02d', $y, $m, $d);
		} else {
			$date = date( 'Y-m-d', strtotime( $date ) );
		}

		return $date;
	}

	/**
	 * Get date range by filter
	 *
	 * Calculates the date range based on the filter value selected.
	 * 
	 * @param  string $filter
	 * @return array  $date_range
	 */
	public static function get_date_range_by_filter( $filter ) {

		$today = current_time( 'Y-m-d' );
		$current_month = date( 'm', strtotime( $today ) );
		$current_year = date( 'Y', strtotime( $today ) );

		if ( $filter === 'week' ) {

			$start_date = self::db_date( $today . '- 7 days' );
			$end_date = self::db_date( $today );

		} elseif ( $filter === 'month' ) {

			$start_date = date( 'Y-m-01', strtotime( $today ) );
			$end_date = date('Y-m-t', strtotime( $today ) );

		} elseif ( $filter === 'quarter' ) {

			if( $current_month >= 1 && $current_month <= 3 )
			{
				$start_date = $current_year . '-01-01';
				$end_date = $current_year . '-03-31';
			}
			elseif( $current_month >= 4 && $current_month <= 6 )
			{
				$start_date = $current_year . '-04-01';
				$end_date = $current_year . '-06-30';
			}
			elseif( $current_month >= 7 && $current_month <= 9)
			{
				$start_date = $current_year . '-07-01';
				$end_date = $current_year . '-09-30';
			}
			elseif( $current_month >= 10 && $current_month <= 12 )
			{
				$start_date = $current_year . '-10-01'; 
				$end_date = ($current_year + 1) . '-01-01';
			}

		} else if ( $filter === 'year' ) {

			$start_date = $current_year . '-01-01'; 
			$end_date = ($current_year + 1) . '-01-01';
		}

		$date_range = array(
			'start_date' => $start_date,
			'end_date' => $end_date
		);
		llms_log('date filter');
		llms_log($date_range);
		return $date_range;

	}

	/**
	 * Query Filter for for last 7 days
	 * Appends AND statement to WP_Query WHERE clause
	 * Only retrieves posts created
	 * @param  string $where [WP_Query Where clause]
	 * @return [string]        [modified where clause]
	 */
	public function last_seven_days( $where = '' ) {
		global $wpdb;
 
    	$where .= $wpdb->prepare( " AND post_date > %s", date( 'Y-m-d', strtotime('-7 days') ) );
 
    	return $where;
	}

	public static function get_last_login_date( $user_id ) {

		$date = get_user_meta( $user_id, 'llms_last_login', true );

		if ( $date ) {
			return date('d.m.Y H:i:s', get_user_meta( $user_id, 'llms_last_login', true ) );
		} else {
			return false;
		}

		
	}



}

return new LLMS_Date;