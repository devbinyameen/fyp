@extends('frontend.layouts.template')

@section('content')

			<!-- Including header -->
		@include('frontend.pages.includes.header')


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>FAQs</h1>
				<span>All your Questions answered in one place</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active text-white" aria-current="page">FAQs</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row gutter-40 col-mb-80">
						<!-- Post Content
						============================================= -->
						<div class="postcontent col-lg-9">


                            <div id="faqs" class="faqs">

                                <div id="faqs-list" class="fancy-title title-bottom-border">
                                    <h3>Some of your Questions:</h3>
                                </div>

                                <ul class="iconlist faqlist">
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-1">What is the procedure for Pickup?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-2">What are the pickup charges?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-3">What duration of notice is required for pickup?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-4">How can I track my shipment? How can I track my C.O.D shipment?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-5">How to acquire shipper’s address when it is a COD shipment?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-6">How can I find out how long it will take for my shipment to be delivered?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-7">What happens if a shipment I send cannot be delivered?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-8">What happens if the recipient/consignee is not available at home/delivery address?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-9">How can I get a proof of delivery (POD)?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-10">How can I change shippers address?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-11">After I book a shipment what details do you offer me?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-12">What does the shipment status “Returned to Shipper” mean?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-13">Can I contact you after the office is closed?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-14">How do I know if the item I need to send is prohibited?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-15">What details will I get about my Shipment’s transit?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-16">How can I change shippers address?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-17">What is your policy when anything goes wrong during delivery?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-18">What can I do if our monthly bill is incorrect?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-19">What are your hours for delivery?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-20">How do you calculate your fuel surcharge?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-21">Is my consignment insured?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-22">Can I send fragile goods via courier?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-23">Do you deliver on holidays?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-24">Is it possible to deliver on a particular time?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-25">What are your service charges?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-26">Will I get a refund if my shipment is not on time?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-27">What do I do if my shipment is damaged or lost?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-28">How can I claim for my shipment?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-29">What is Air Waybill or Consignment Note Number?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-30">My receiver says he never received the package, can you help?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-31">What can I do if there is a change of plan after you have collected?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-32">What happens if I give you the wrong address?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-33">Can I book a collection from outside city?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-34">What are the services available for pick-up?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-35">In case a shipment is lost will DN Courier Service Pvt Ltd still be liable to give us the market value of the good that has been lost?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-36">How does shipper know if his shipment is dutiable?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-37">Does DN Courier Service Pvt Ltd internationally offer Holiday Service?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-38">What happens if an International Shipment is pending and NO New Details are provided?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-39">If an International Shipment is dutiable, how does it affect delivery times?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-40">What happens in case a shipper wants to return an undelivered International Shipment to the Origin?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-41">Who pays duty on goods?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-42">Does GROOTLANE consider all shipment as a liability?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-43">From which countries can I import a shipment to my own country?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-44">Does DN Courier Service Pvt Ltd deliver to PO boxes?</a></strong></li>
                                    <li><i class="icon-caret-right"></i><strong><a href="#" data-scrollto="#faq-45">Why do I need to provide the weight and dimensions of my parcel?</a></strong></li>

                                </ul>

                                <div class="divider"><i class="icon-circle"></i></div>

                                <h3 id="faq-1"><strong>Q.</strong> What is the procedure for Pickup?</h3>
                                <p>
                                    GROOTLANE pickup service is available Monday to Saturday as a regular GROOTLANE service.GROOTLANE Courier Services schedules your pick-up according to your home or office address. You can request for pickup by simply calling us at, 03023373253.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-2"><strong>Q.</strong> What are the pickup charges?</h3>
                                <p>
                                    There are no additional pickup charges. We offer the pickup service free of cost.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-3"><strong>Q. What duration of notice is required for pickup?</strong> </h3>
                                <p>
                                    Pickup can be ordered any time before 4pm.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-4"><strong>Q. How can I track my shipment? How can I track my C.O.D shipment?</strong> </h3>
                                <p>
                                    You can track your shipment as follows: <br>
                                    Web Tracking (www.dncourier.com)
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-5"><strong>Q. How to acquire shipper’s address when it is a COD shipment?</strong> </h3>
                                <p>
                                    To find out more details about the shipper please email us at dncourierofficial@.com and mention your name, city, address and tracking number. Please remember that GROOTLANE is not responsible for the quality of delivered material as we are only responsible for delivery of the products. We do not own or sell any items unless otherwise mentioned. Further, DN Courier is not liable for the time duration it may take the shipper to contact the shipment recipient, so complaints related to delays in returns or exchanges will not be entertained by DN Courier once the shippers info. Has been provided.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-6"><strong>Q. How can I find out how long it will take for my shipment to be delivered?</strong> </h3>
                                <p>
                                    You can either visit our express center or call us at our helpline, 03023373253 When doing so, you should be sure to have the address where the shipment will be booked / picked up from, and the city, country and postal code of where it will be delivered.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-7"><strong>Q. What happens if a shipment I send cannot be delivered?</strong> </h3>
                                <p>
                                    We will make up to 2 attempts to deliver a shipment. Our courier rider will leave a message indicating a delivery was attempted, and information as to where you should call for further information (such as the address of the location from where you can pick it up). Most of the times the shipment can then be picked up from the nearest express center. If a shipment is not delivered due to change in address, business closure, etc., the shipment will be returned to the sender/ consignor.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-8"><strong>Q. What happens if the recipient/consignee is not available at home/delivery address?</strong> </h3>
                                <p>
                                    Don’t worry if you are not available. We can hand over your parcel to your family members, colleagues or a neighbor and collect proof of delivery. If no one is available, our courier will leave a message and will make another attempt at your convenience.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-9"><strong>Q. How can I get a proof of delivery (POD)?</strong> </h3>
                                <p>
                                    You can view the delivery status under ‘tracking’, in case status is not available online please call our customer service at 03023373253 and we will be pleased to provide you with a copy of the POD.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-10"><strong>Q. How can I change shippers address?</strong> </h3>
                                <p>
                                    The address can only be changed at the request of the shipper. Please notify us on dncourierofficial.com within 24 hours of booking your parcel.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-11"><strong>Q. After I book a shipment what details do you offer me?</strong> </h3>
                                <p>
                                    Your detailed tracking response will list the following information:
                                    <ol class="ml-5">
                                        <li> Tracking number </li>
                                        <li> Delivery status </li>
                                        <li> Delivery date, time and received by </li>
                                        <li> Location where the Shipment was delivered </li>
                                        <li> Date on which the shipment was shipped or billed </li>
                                        <li> Type of service used to ship the Shipment </li>
                                        <li> Shipment’s weight & pieces </li>
                                    </ol>
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-12"><strong>Q. What does the shipment status “Returned to Shipper” mean?</strong> </h3>
                                <p>
                                    The title “Returned to Shipper” in the status means that shipment was returned back to the shipper who booked the shipment. It could happen due to various reasons, e.g. refused to accept by consignee, address not traceable or etc.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-13"><strong>Q. Can I contact you after the office is closed?</strong> </h3>
                                <p>
                                    Yes! Our customer service agents are there to assist you. Ring us at 03023373253
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-14"><strong>Q. How do I know if the item I need to send is prohibited?</strong> </h3>
                                <p>
                                    The following items cannot be couriered via us: currency ,jewelry, Bullion ,antiques, liquor, stamps, precious metals & stones ,works of art ,fire arms ,plants, drugs, explosives, animals, industrial carbons and diamonds ,hazardous and combustible materials and all other materials restricted by International Air Transport Association , ICAO International Civil Aviation Organization ,and any item whose distribution is regulated by law.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-15"><strong>Q. What details will I get about my Shipment’s transit?</strong> </h3>
                                <p>
                                    Shipment movement information is captured each time a tracking sticker is scanned. Common scans include the following information:
                                    <ol>
                                        <li> Origin </li>
                                        <li> Destination </li>
                                        <li> Date of Booking </li>
                                        <li> Shipment Number </li>
                                        <li> Shipment Weight & Pieces </li>
                                    </ol>
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-16"><strong>Q. How can I change shippers address?</strong> </h3>
                                <p>
                                    The address can only be changed at the request of the shipper. Please notify us on dncourierofficail@gamil.com within 24 hours of booking your parcel.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-17"><strong>Q. What is your policy when anything goes wrong during delivery?</strong> </h3>
                                <p>
                                    Having over years of experience in the courier industry, GROOTLANE have learnt to deal with most things which could go wrong and so have standby solutions. It is our policy to make prompt alternative arrangements for any type of delays i.e. flight off-load, technical issues, due to accidents, breakdowns etc.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-18"><strong>Q. What can I do if our monthly bill is incorrect?</strong> </h3>
                                <p>
                                    If your monthly bill is incorrect you may contact us with in 10 to 15 days for your queries after submission of bill which is submitted by 5th of every month.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-19"><strong>Q. What are your hours for delivery?</strong> </h3>
                                <p>
                                    Our delivery hours are 09:00 am to 9:00 pm Monday to Saturday.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-20"><strong>Q. How do you calculate your fuel surcharge?</strong> </h3>
                                <p>
                                    We charge fuel on a based on certain percentage, which is fixed for a year, but changes are subject to fluctuations in the fuel prices
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-21"><strong>Q. Is my consignment insured?</strong> </h3>
                                <p>
                                    No, we do not insure the consignment unless the shipper asks for insurance facility. In that case we insure the consignment at 5% of the total value
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-22"><strong>Q. Can I send fragile goods via courier?</strong> </h3>
                                <p>
                                    Fragile goods sendt by our courier should be packed properly with proper labelling as we do not take any responsibility, claim or insurance of such fragile goods but we will ensure safe delivery.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-23"><strong>Q. Do you deliver on holidays?</strong> </h3>
                                <p>
                                    We make deliveries on holidays in major cities of Pakistan. Please view our network list for more details.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-24"><strong>Q. Is it possible to deliver on a particular time?</strong> </h3>
                                <p>
                                    Definitely! We deliver on the time specified by you. You can choose any time between 10:00 am to 9:00 pm for delivery. Extra charges will apply for time specified deliveries.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-25"><strong>Q. What are your service charges?</strong> </h3>
                                <p>
                                    For your convenience, all charges are posted on the company website along with a weight calculator. There are no hidden costs hence you will be charged exactly the price that is quoted under each product / service. Extra charges will be applicable for special services such as delivery requests on Sunday, Public Holidays, Same Day and/or Time stipulated delivery service.
                                    <br>
                                    Our corporate clients are requested to contact their respective sales representative for charges and other related details.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-26"><strong>Q. Will I get a refund if my shipment is not on time?</strong> </h3>
                                <p>
                                    As per company policy, GROOTLANE will not be held liable for damages and loss due to late delivery and/or interruption of service due to a cause beyond organizational control.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-27"><strong>Q. What do I do if my shipment is damaged or lost?</strong> </h3>
                                <p>
                                    We entertain only the claim which is lodged by the customer within 10-days after the incident, and with due process of 45-days we settle the claim after investigation.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-28"><strong>Q. How can I claim for my shipment?</strong> </h3>
                                <p>
                                    All claims must be submitted in writing to DN Courier Services within thirty (30) days from the date of booking. DN Courier Services shall have no liability whatsoever if you do not notify us within the given period.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-29"><strong>Q. What is Air Waybill or Consignment Note Number?</strong> </h3>
                                <p>
                                    Air Waybill or Consignment Note Number is used by DN Courier Services to categorize and trace every shipment as it moves through our system or network to its destination. Our latest system which assigns tracking number to every shipment automatically
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-30"><strong>Q. My receiver says he never received the package, can you help?</strong> </h3>
                                <p>
                                    Yes! We have a written record of every delivery which proves who received, when and where every consignment was delivered.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-31"><strong>Q. What can I do if there is a change of plan after you have collected?</strong> </h3>
                                <p>
                                    This is not a problem. Just let us know what changes have occurred and we can contact the concerned station to re-route your consignment.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-32"><strong>Q. What happens if I give you the wrong address?</strong> </h3>
                                <p>
                                    If we are given a wrong address we will contact the concerned station for re-direction or recollection of shipment according to request.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-33"><strong>Q. Can I book a collection from outside city?</strong> </h3>
                                <p>
                                    Yes! We have offices throughout the country and we can collect your package from anywhere with an extra charge for this service.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-34"><strong>Q. What are the services available for pick-up?</strong> </h3>
                                <p>
                                    Pick-up facility is available for all type of shipments
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-35"><strong>Q. In case a shipment is lost will DN Courier Service Pvt Ltd still be liable to give us the market value of the good that has been lost?</strong> </h3>
                                <p>
                                    If the shipment is insured then Yes, DN Courier Service Pvt Ltd is liable to pay the market value of the lost shipment. If the shipment is not insured then the DN Courier Service Pvt Ltd Customer Satisfaction will take over the lost shipment case and resolve the case after complete scrutiny & verification procedures.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-36"><strong>Q. How does shipper know if his shipment is dutiable?</strong> </h3>
                                <p>
                                    Each country establishes its own standards as to which goods are considered dutiable. For further details simply dial 03023373253.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-37"><strong>Q. Does DN Courier Service Pvt Ltd internationally offer Holiday Service?</strong> </h3>
                                <p>
                                    DN Courier Service Pvt Ltd do not offer holiday service on International Shipments.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-38"><strong>Q. What happens if an International Shipment is pending and NO New Details are provided?</strong> </h3>
                                <p>
                                    On all such pending shipments shipper will have to send new details within 05 working days from the date informed, If not then shipper will have to abandon the shipment, the same will be destroyed or disposed off. However shipper still remains liable for all additional costs. (Duty and Taxes).
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-39"><strong>Q. If an International Shipment is dutiable, how does it affect delivery times?</strong> </h3>
                                <p>
                                    All shipments must go through a customs clearance procedure, which can affect the transit time. Normally it takes 1 to 5 business days to clear the shipment through customs however some items particularly unusual or high value items are detained by customs for a longer period of time.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-40"><strong>Q. What happens in case a shipper wants to return an undelivered International Shipment to the Origin?</strong> </h3>
                                <p>
                                    For all such shipments Return to Origin (RTO) request will be notified in writing by the shipper and all return or redirection duties, taxes billed at destination & RTO charges will be payable by the shipper
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-41"><strong>Q. Who pays duty on goods?</strong> </h3>
                                <p>
                                    The Consignee typically pays duty charges. However, shipper may also choose to pay them, which means he is requesting Delivery Duty Paid Service.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-42"><strong>Q. Does GROOTLANE consider all shipment as a liability?</strong> </h3>
                                <p>
                                    Every International Shipment is transported on a limited liability basis as provided on the airway bill.  (DN Courier Service Pvt Ltd liability is strictly limited to direct loss. DN Courier Service Pvt Ltd maximum liability in the event of loss or damage to a shipment is US$100 or the value on the airway bill whichever is lesser).
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-43"><strong>Q. From which countries can I import a shipment to my own country?</strong> </h3>
                                <p>
                                    Shipments can be imported and exported from countries listed in our tariff. You can contact our customer services for additional information at 03023373253.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-44"><strong>Q. Does DN Courier Service Pvt Ltd deliver to PO boxes?</strong> </h3>
                                <p>
                                    No. DN Courier Service Pvt Ltd is unable to deliver to PO boxes. A full street address and Tel# is required.
                                </p>

                                <div class="divider divider-right"><a href="#" data-scrollto="#faqs-list"><i class="icon-chevron-up"></i></a></div>

                                <h3 id="faq-45"><strong>Q. Why do I need to provide the weight and dimensions of my parcel?</strong> </h3>
                                <p>
                                    Exact weight and dimensions are necessary to ensure speedy delivery. If this information is not accurate, your parcel may be delayed in transit, the difference in cost will be requested and a possible additional service fee applied before the parcel’s journey can continue.
                                </p>

                            </div>


						</div><!-- .postcontent end -->

						<!-- Sidebar -->
                            @include('frontend.pages.includes.sidebar')
						<!-- .sidebar end -->
					</div>

				</div>
			</div>
		</section><!-- #content end -->

@endsection
