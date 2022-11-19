<?php // phpcs:ignore
/**
 * Job Page Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Job Page Fields
 */
class JobPageFields {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'fields' ) );
	}

	/**
	 * Registers the field group.
	 *
	 * @return void
	 */
	public function fields() {
		$location = array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'templates/archive-job.php',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_job_page',
					'title'    => __( 'Job Page Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'        => 'field_job_page_notice',
							'label'      => __( 'Notice', 'creatorfund' ),
							'name'       => 'notice',
							'type'       => 'group',
							'sub_fields' => array(
								array(
									'key'          => 'field_job_page_notice_title',
									'label'        => __( 'Title', 'creatorfund' ),
									'name'         => 'title',
									'type'         => 'text',
									'placeholder'  => __( 'Title', 'creatorfund' ),
									'instructions' => __( 'Title of the notice.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_job_page_notice_content',
									'label'        => __( 'Content', 'creatorfund' ),
									'name'         => 'content',
									'type'         => 'textarea',
									'rows'         => 4,
									'placeholder'  => __( 'Content', 'creatorfund' ),
									'instructions' => __( 'Content of the notice.', 'creatorfund' ),
								),
								array(
									'key'           => 'field_job_page_notice_link',
									'label'         => __( 'Link', 'creatorfund' ),
									'name'          => 'link',
									'type'          => 'link',
									'return_format' => 'array',
									'instructions'  => __( 'Link of the notice.', 'creatorfund' ),
								),
							),
						),

					),
					'location' => $location,
				)
			);
		}
	}
}
