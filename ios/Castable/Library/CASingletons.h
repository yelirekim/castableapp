//
//  CASingletons.h
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import "CASingleton.h"

#define CA_DECLARE_SINGLETON_WITH_ACCESSOR(classname, accessorMethodName) \
+ (classname *)accessorMethodName;

#define CA_SYNTHESIZE_SINGLETON_WITH_ACCESSOR(classname, accessorMethodName) \
+ (classname *)accessorMethodName \
{ \
    static classname *accessorMethodName##Instance = nil; \
    static dispatch_once_t onceToken; \
    dispatch_once(&onceToken, ^ { \
        accessorMethodName##Instance = [super allocWithZone:NULL]; \
        accessorMethodName##Instance = [accessorMethodName##Instance init]; \
    }); \
    return accessorMethodName##Instance; \
}

#define CA_DECLARE_SINGLETON(classname) CA_DECLARE_SINGLETON_WITH_ACCESSOR(CA##classname, shared##classname)
#define CA_SYNTHESIZE_SINGLETON(classname) CA_SYNTHESIZE_SINGLETON_WITH_ACCESSOR(CA##classname, shared##classname)

@interface CASingletons : NSObject <CASingleton> {
    NSArray * _singletons;
}
CA_DECLARE_SINGLETON(Singletons)
@end
