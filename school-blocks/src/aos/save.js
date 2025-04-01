import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const { animationType } = attributes;
    
    // Configure block props with AOS attributes
    const blockProps = useBlockProps.save({
        'data-aos': animationType || 'fade-up',
        'data-aos-once': 'true',
        'data-aos-duration': '600', 
        className: 'school-aos-block' // For custom styling
    });

    return (
        <div {...blockProps}>
            <InnerBlocks.Content />
        </div>
    );
}
