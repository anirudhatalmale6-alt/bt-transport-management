<?php
/**
 * Front page — the BT Transport Management homepage.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

$phone   = bttm_opt( 'bttm_phone', '07759 725595' );
$tel     = bttm_tel();
$email   = bttm_opt( 'bttm_email', 'info@bttransportmanagement.co.uk' );
$flyer   = bttm_opt( 'bttm_flyer', get_template_directory_uri() . '/assets/services-flyer.jpeg' );
$youtube = bttm_opt( 'bttm_youtube' );
$logo    = get_template_directory_uri() . '/assets/logo.jpeg';
$status  = isset( $_GET['enquiry'] ) ? sanitize_key( $_GET['enquiry'] ) : '';
?>
<main id="top">
	<section class="hero">
		<div class="hero-grid"></div><div class="glow"></div>
		<div class="hero-copy">
			<p class="eyebrow"><i></i> External Transport Management</p>
			<h1>Keep your fleet <em>moving.</em><br />Keep your business protected.</h1>
			<p class="hero-intro">Practical, proactive transport management for HGV operators who want the confidence to focus on the road ahead.</p>
			<div class="hero-actions">
				<a class="button button-primary call-button" href="tel:<?php echo esc_attr( $tel ); ?>"><span class="call-copy">Arrange a free call <small><?php echo esc_html( $phone ); ?></small></span><span>&#8594;</span></a>
				<a class="text-link" href="#services">Explore our services <span>&#8595;</span></a>
			</div>
			<div class="trust-row"><span><b>01</b> Yorkshire, Humberside &amp; East Midlands</span><span><b>02</b> Operator licence focused</span><span><b>03</b> Built around your operation</span></div>
		</div>
		<div class="hero-logo-art" aria-hidden="true"><img src="<?php echo esc_url( $logo ); ?>" alt="" /></div>
	</section>

	<section class="strip"><p>RELIABLE OVERSIGHT</p><span>&#10022;</span><p>CONSCIENTIOUS SUPPORT</p><span>&#10022;</span><p>COMMERCIAL CLARITY</p><span>&#10022;</span><p>RELIABLE OVERSIGHT</p></section>

	<section class="services section" id="services">
		<div class="section-heading"><p class="eyebrow"><i></i> What we do</p><h2>Transport compliance, <br /><em>without the headache.</em></h2></div>
		<p class="section-lede">Whether you have one vehicle or a growing fleet, we provide the oversight, systems and advice that keep your operation running properly.</p>
		<div class="service-grid">
			<article><span class="number">01</span><h3>External Transport Manager</h3><p>Named, experienced oversight for your operator licence — with a level of support that works for your operation.</p><a href="#contact">Find out more <span>&#8594;</span></a></article>
			<article><span class="number">02</span><h3>Operator Licence Support</h3><p>From applications and variations to ongoing compliance, we help you meet your commitments with confidence.</p><a href="#contact">Find out more <span>&#8594;</span></a></article>
			<article><span class="number">03</span><h3>Compliance Health Checks</h3><p>A clear-eyed review of your systems, records and risks — with practical recommendations you can act on.</p><a href="#contact">Find out more <span>&#8594;</span></a></article>
		</div>
	</section>

	<section class="services-overview section" aria-labelledby="services-overview-title">
		<div class="flyer-preview">
			<button class="flyer-open" type="button" aria-haspopup="dialog" aria-controls="flyer-dialog">
				<img src="<?php echo esc_url( $flyer ); ?>" alt="BT Transport Management services flyer" />
				<span>View full services flyer <b>&#8599;</b></span>
			</button>
		</div>
		<div class="overview-copy">
			<p class="eyebrow"><i></i> Full scope of support</p>
			<h2 id="services-overview-title">The right support,<br /><em>where you need it.</em></h2>
			<p>From a single compliance check to fully managed transport support, BT Transport Management helps protect your operator licence and keep your business moving.</p>
			<div class="service-list">
				<details open><summary>Operator licence &amp; transport management</summary><p>External Transport Manager (CPC holder), applications and variations, licence compliance management, start-up support and consultancy.</p></details>
				<details><summary>Driver &amp; fleet compliance</summary><p>Driver licence monitoring, driver hours and working time compliance, tachograph analysis, fleet audits, risk management and maintenance-system support.</p></details>
				<details><summary>Audits, investigations &amp; improvement</summary><p>Compliance health checks, internal investigations, OCRS performance improvement, DVSA Earned Recognition preparation and continuous monitoring.</p></details>
				<details><summary>Training, policies &amp; representation</summary><p>Fleet compliance training, driver handbook development, policies and procedures, public inquiry preparation and FORS accreditation support.</p></details>
			</div>
			<?php if ( $youtube ) : ?>
				<a class="training-link" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener">Watch our training channel <span>&#8599;</span></a>
			<?php endif; ?>
		</div>
	</section>

	<section class="approach section" id="approach">
		<div><p class="eyebrow"><i></i> A clearer route forward</p><h2>Simple support.<br /><em>Serious standards.</em></h2></div>
		<div class="steps"><article><span>01</span><div><h3>Understand your operation</h3><p>We start with your vehicles, your work and what keeps you awake at night.</p></div></article><article><span>02</span><div><h3>Put the right controls in place</h3><p>Clear processes, usable records and straightforward accountability — without unnecessary bureaucracy.</p></div></article><article><span>03</span><div><h3>Stay on top of it together</h3><p>Regular contact and practical guidance mean small issues are dealt with before they become big ones.</p></div></article></div>
	</section>

	<section class="about section" id="about"><div class="about-panel"><p class="eyebrow"><i></i> The BT difference</p><h2>Good compliance is not about ticking boxes. <em>It is about good business.</em></h2><p>We bring calm, straight-talking expertise to the responsibility of running HGVs. The result is a safer, more organised operation that earns trust — from drivers, customers and regulators alike.</p><a class="button button-light" href="#contact">Talk to an expert <span>&#8594;</span></a></div><div class="stat-stack"><div><strong>100%</strong><p>focused on your operational needs</p></div><div><strong>UK</strong><p>support for operators nationwide</p></div></div></section>

	<section class="contact section" id="contact">
		<div>
			<p class="eyebrow"><i></i> Start the conversation</p>
			<h2>Let&rsquo;s keep your<br /><em>business moving.</em></h2>
			<p>Tell us a little about your operation and we&rsquo;ll arrange a no-obligation conversation.</p>
			<a class="contact-email" href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?> <span>&#8599;</span></a>
			<?php if ( $youtube ) : ?><br /><a class="contact-email" href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener">Training channel <span>&#8599;</span></a><?php endif; ?>
		</div>
		<form class="enquiry-form" method="post" action="<?php echo esc_url( home_url( '/#contact' ) ); ?>">
			<?php if ( 'sent' === $status ) : ?>
				<p class="form-status form-status--ok">Thanks — your enquiry has been sent. We&rsquo;ll be in touch shortly.</p>
			<?php elseif ( 'error' === $status ) : ?>
				<p class="form-status form-status--err">Sorry, something went wrong. Please check your name and email and try again.</p>
			<?php endif; ?>
			<div class="field-row">
				<label>Your name<input type="text" name="name" placeholder="Jane Smith" required /></label>
				<label>Company<input type="text" name="company" placeholder="Your company" /></label>
			</div>
			<div class="field-row">
				<label>Email<input type="email" name="email" placeholder="jane@yourcompany.co.uk" required /></label>
				<label>Phone<input type="tel" name="phone" placeholder="<?php echo esc_attr( $phone ); ?>" required /></label>
			</div>
			<label>How can we help?
				<select name="topic">
					<option>I'm looking for an External Transport Manager</option>
					<option>I need operator licence support</option>
					<option>I would like a compliance health check</option>
					<option>Something else</option>
				</select>
			</label>
			<label>Message<textarea name="message" rows="4" placeholder="Tell us a little about your operation — fleet size, licence status, timescales&hellip;"></textarea></label>
			<input type="text" name="bttm_website" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true" />
			<input type="hidden" name="bttm_enquiry" value="1" />
			<?php wp_nonce_field( 'bttm_enquiry', 'bttm_nonce' ); ?>
			<button class="button button-primary" type="submit">Request a call <span>&#8594;</span></button>
		</form>
	</section>
</main>

<dialog class="flyer-dialog" id="flyer-dialog" aria-labelledby="flyer-dialog-title">
	<div class="dialog-bar"><strong id="flyer-dialog-title">BT Transport Management — Services</strong><button class="flyer-close" type="button" aria-label="Close flyer">&times;</button></div>
	<img src="<?php echo esc_url( $flyer ); ?>" alt="Full BT Transport Management services flyer" />
</dialog>

<?php get_footer(); ?>
