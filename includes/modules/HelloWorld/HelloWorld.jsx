// External Dependencies
import React, { Fragment, Component } from 'react';
import jQuery from 'jquery';


// Internal Dependencies
import './style.css';


class HelloWorld extends Component {

	componentDidUpdate (){
		console.log('hello');
		jQuery(".main").tiltedpage_scroll({
			sectionContainer: "> section",     // In case you don't want to use <section> tag, you can define your won CSS selector here
			angle: 50,                         // You can define the angle of the tilted section here. Change this to false if you want to disable the tilted effect. The default value is 50 degrees.
			opacity: true,                     // You can toggle the opacity effect with this option. The default value is true
			scale: true,                       // You can toggle the scaling effect here as well. The default value is true.
			outAnimation: true                 // In case you do not want the out animation, you can toggle this to false. The defaul value is true.
		});
	}

	static css(props) {

		const additionalCss = [];
        console.log(props);
		if (props.content !== undefined) {
			additionalCss.push([{
				selector:    '%%order_class%% section',
				declaration: `background-color: ${props.content.attrs.height};`,
			}]);
		}
		return additionalCss;
	}

	getImageSize (src){
		let img = new Image();
		img.onload = function() {
			console.log(this.width + 'x' + this.height);
		};
		img.src = src;
	}

	static slug = 'etl_hello_world';
	renderImages(){

		if(this.props.content) {
			const children = this.props.content;
			console.log(children);
			this.getImageSize(children[0].props.attrs.src);


			return this.props.content.map((content) => {
				let  border_style = '';
				let border_style_left = '';
				let border_style_top = '';
				const attr = content.props.attrs;
				if(attr.border_style_top === undefined){
					if(!attr.border_style_all === undefined)
						border_style_top = attr.border_style_all;
					else{
						border_style_top = 'solid';
					}
				}
				else{
					border_style_top = attr.border_style_top;
				}
				if(attr.border_style_left === undefined){
					if(!attr.border_style_all === undefined)
						border_style_left = attr.border_style_all;
					else{
						border_style_left = 'solid';
					}
				}
				else{
					border_style_left = attr.border_style_left;
				}
				if(attr.border_style_all === undefined)
				{
					border_style = 'solid';
				}
				else{
					border_style = content.props.attrs.border_style_all;
				}
				let border_width = '';
				if (attr.border_width_top === undefined && attr.border_width_right === undefined && attr.border_width_bottom === undefined && attr.border_width_left === undefined){
					border_width = attr.border_width_all;
				} else {
					border_width = `${attr.border_width_top !== undefined ? attr.border_width_top : attr.border_width_all} ${attr.border_width_right !== undefined ? attr.border_width_right : attr.border_width_all} ${attr.border_width_bottom !== undefined ? attr.border_width_bottom : attr.border_width_all} ${attr.border_width_left !== undefined ? attr.border_width_left : attr.border_width_all}`
				}
				const border_radius_string = attr.border_radii;
				const border_radius_array = border_radius_string !== undefined ? border_radius_string.split('|'):'';

				const borderTopLeftRadius = border_radius_array ? border_radius_array[1]: '0px';
				const borderTopRightRadius = border_radius_array ? border_radius_array[2]: '0px';
				const borderBottomRightRadius = border_radius_array ? border_radius_array[3]: '0px';
				const borderBottomLeftRadius = border_radius_array ? border_radius_array[4]: '0px';
				const divStyle = {
					height: content.props.attrs.height,

				};
				const imgStyle = {
					borderTopLeftRadius,
					borderTopRightRadius,
					borderBottomRightRadius,
					borderBottomLeftRadius,
					borderRadius: attr.border_radii,
					boxShadow: `${attr.box_shadow_horizontal} ${attr.box_shadow_vertical} ${attr.box_shadow_blur} ${attr.box_shadow_spread} ${attr.box_shadow_color}`,
					borderStyle: border_style,
					borderColor: attr.border_color_all !== undefined ? attr.border_color_all : '#00000',
					borderLeftStyle: attr.border_style_left !== undefined ? attr.border_style_left: attr.border_style_all,
					borderLeftColor: attr.border_color_left !== undefined ? attr.border_color_left: attr.border_color_all,
					borderTopStyle: attr.border_style_top !== undefined ? attr.border_style_top: attr.border_style_all,
					borderTopColor: attr.border_color_top !== undefined ? attr.border_color_top: attr.border_color_all,
					borderRightStyle: attr.border_style_right !== undefined ? attr.border_style_right: attr.border_style_all,
					borderRightColor: attr.border_color_right !== undefined ? attr.border_color_right: attr.border_color_all,
					borderBottomStyle: attr.border_style_bottom !== undefined ? attr.border_style_bottom: attr.border_style_all,
					borderBottomColor: attr.border_color_bottom !== undefined ? attr.border_color_bottom: attr.border_color_all,
					borderWidth: border_width
				}
				return (
					<section className="hello_item" style={divStyle} key={content.key}>
						<img src={content.props.attrs.src} style={imgStyle} alt=''/>
					</section>
				);
			});
		} else{
			return '';
		}
	}
	render() {



		return (

				<div className="main">
				{this.renderImages()}
				</div>

		);
	}
}

export default HelloWorld;
