import { useBlockProps, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n'; // Required for translations

export default function Edit({ attributes, setAttributes }) {
    const { animationType } = attributes;
    const blockProps = useBlockProps({
        className: `aos-block`, // Optional: Add a CSS class
    });

    // Animation options
    const animationOptions = [
        { value: 'fade-up', label: __('Fade Up', 'school-blocks') },
        { value: 'fade-down', label: __('Fade Down', 'school-blocks') },
        { value: 'fade-left', label: __('Fade Left', 'school-blocks') },
        { value: 'fade-right', label: __('Fade Right', 'school-blocks') },
        { value: 'zoom-in', label: __('Zoom In', 'school-blocks') },
    ];

    return (
        <div {...blockProps}>
            {/* Sidebar Controls */}
            <InspectorControls>
                <PanelBody title={__('Animation Settings', 'school-blocks')}>
                    <SelectControl
                        label={__('Animation Type', 'school-blocks')}
                        value={animationType}
                        options={animationOptions}
                        onChange={(newType) => setAttributes({ animationType: newType })}
                    />
                </PanelBody>
            </InspectorControls>

            {/* Block Preview */}
            <div 
                data-aos={animationType} 
                data-aos-once="true" // Ensures animation triggers once
            >
                <InnerBlocks 
                    allowedBlocks={['core/paragraph', 'core/heading', 'core/image']}
                    template={[ // Default content
                        ['core/paragraph', { placeholder: __('Add content...', 'school-blocks') }]
                    ]}
                    templateLock={false}
                />
            </div>
        </div>
    );
}